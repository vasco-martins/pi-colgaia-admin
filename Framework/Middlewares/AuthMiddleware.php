<?php


namespace Framework\Middlewares;


use Framework\Auth\Auth;

class AuthMiddleware implements Middleware
{
    public static function handle(): void
    {
        if(Auth::user() == null) {
            redirect(router()->url('auth.login'));
        }
    }
}