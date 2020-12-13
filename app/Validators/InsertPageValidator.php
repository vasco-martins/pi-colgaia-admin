<?php


namespace App\Validators;


use App\Models\Page;
use Framework\Validators\Validate;
use Framework\Validators\Validator;
use Symfony\Component\HttpFoundation\Request;

class InsertPageValidator extends Validator
{

    public static function handle(Request $request): array
    {
        $data = self::only($request, ['id', 'title', 'subtitle', 'slug', 'content', 'template_id', 'page_id', 'position']);

        if(!$data['id']) unset($data['id']);
        if($data['page_id'] == 0) unset($data['page_id']);

        $valid = true;
        $errors = [];
        foreach($data as $key=>$value) {
            if(!$value) {
                $valid = false;
                $errors[$key] = 'Campo obrigatório';
            }
        }

        if(!$valid) {
            back(['errors' => $errors]);
            die;
        }

        if(!preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $data['slug'])) {
           back(['errors' => ['slug' => 'Slug inválida']]);
           die;
        }

        if(Validate::exists($data['slug'], 'pages','slug', $data['id'] ?? null)) {
            back(['errors' => ['slug' => 'Slug já existe']]);
            die;
        }

        // Banner validation
        $banner = $request->files->get('banner');

        $bannerError = Validate::validateUploadedImage($banner, !array_key_exists('id', $data));

        if($bannerError) {
            back(['errors' => ['banner' => $bannerError]]);
            die;
        }

        if($data['position'] <= 0) {
            back(['errors' => ['order' => 'A orderm deve ser maior do que 0']]);
            die;
        }

        return $data;
    }
}