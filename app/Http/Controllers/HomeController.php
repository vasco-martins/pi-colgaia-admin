<?php


namespace App\Http\Controllers;


use Framework\Middlewares\AuthMiddleware;
use Framework\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index() {

        return view('home');
    }

}