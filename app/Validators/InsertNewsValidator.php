<?php


namespace App\Validators;


use App\Models\Page;
use Framework\Validators\Validate;
use Framework\Validators\Validator;
use Symfony\Component\HttpFoundation\Request;

class InsertNewsValidator extends Validator
{

    public static function handle(Request $request): array
    {
        $data = self::only($request, ['id', 'title', 'subtitle', 'slug', 'content']);

        if(!$data['id']) unset($data['id']);

        // All fields required
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

        // Validate Slug
        if(!preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $data['slug'])) {
           back(['errors' => ['slug' => 'Slug inválida']]);
           die;
        }

        // Banner validation
        $banner = $request->files->get('banner');

        $bannerError = Validate::validateUploadedImage($banner, !array_key_exists('id', $data));

        if($bannerError) {
           back(['errors' => ['banner' => $bannerError]]);
           die;
        }


        return $data;
    }
}