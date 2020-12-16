<?php


namespace App\Validators;


use App\Models\User;
use Framework\Helpers\Hash;
use Framework\Validators\Validate;
use Framework\Validators\Validator;
use Symfony\Component\HttpFoundation\Request;

class CreateUserValidator extends Validator
{

    public static function handle(Request $request): array
    {
        $data = self::only($request, ['id', 'email', 'name', 'password']);

        if(!$data['id']) unset($data['id']);
        if(!$data['password']) unset($data['password']);

        if(!$data['email']) {
            back(['errors' => ['email' => 'Campo obrigatório.']]);
            die;
        }

        $user = User::find($data['email'], 'email');

        if(!$data['name'] || strlen($data['name']) < 3) {
            back(['errors' => ['name' => 'O nome deve ter, no mínimo, 3 carateres.']]);
            die;
        }

        if(!array_key_exists('id', $data) && count($user) > 0) {
            back(['errors' => ['email' => 'Utilizador já existe']]);
            die;
        }

        if(!array_key_exists('password', $data) && !array_key_exists('id', $data)) {
            back(['errors' => ['password' => 'A password é obrigatória.']]);
            die;
        }

        if(array_key_exists('password', $data) && strlen($data['password']) < 8) {
            back(['errors' => ['password' => 'A password deve ter, no mínimo, 8 carateres.']]);
            die;
        }

        return $data;
    }
}