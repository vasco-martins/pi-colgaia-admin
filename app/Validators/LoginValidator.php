<?php


namespace App\Validators;


use App\Models\User;
use Framework\Helpers\Hash;
use Framework\Validators\Validate;
use Framework\Validators\Validator;
use Symfony\Component\HttpFoundation\Request;

class LoginValidator extends Validator
{

    public static function handle(Request $request): array
    {
        $email = self::sanitize($request->get('email'));
        $password = self::sanitize($request->get('password'));


        $user = User::find($email, 'email');

        if(count($user) == 0) {
            back(['errors' => ['email' => 'Utilizador não encontrado']]);
            die;
        }

        if(!Hash::check($password, $user[0]->password)) {
            back(['errors' => ['email' => 'Email ou password erradas']]);
            die;
        }

        return [
            'email' => $email,
            'password' => $password,
        ];
    }
}