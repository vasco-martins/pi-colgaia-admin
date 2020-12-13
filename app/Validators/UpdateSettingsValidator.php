<?php


namespace App\Validators;


use App\Models\Page;
use Framework\Validators\Validate;
use Framework\Validators\Validator;
use Symfony\Component\HttpFoundation\Request;

class UpdateSettingsValidator extends Validator
{

    public static function handle(Request $request): array
    {
        $data = self::only($request, ['websiteName', 'websiteDescription', 'email', 'address', 'facebook', 'instagram', 'phone']);

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

        // Banner validation
        $logo = $request->files->get('websiteLogo');

        $logoError = Validate::validateUploadedImage($logo, false);

        if($logoError) {
           back(['errors' => ['websiteLogo' => $logoError]]);
           die;
        }


        return $data;
    }
}