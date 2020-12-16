<?php


namespace App\Http\Controllers;


use App\Models\User;
use App\Validators\CreateUserValidator;
use App\Validators\LoginValidator;
use Framework\Auth\Auth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{

    public function login(Request $request) {
        $data = LoginValidator::handle($request);

        $user = User::find($data['email'], 'email');

        Auth::login($user[0]->id);

        return redirect(router()->url('home.index'));
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function show(Request $request): Response
    {
        return view('auth.login');
    }

}