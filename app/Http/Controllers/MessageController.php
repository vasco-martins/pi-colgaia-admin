<?php


namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\Page;
use App\Models\Template;
use App\Validators\InsertPageValidator;
use Framework\Middlewares\AuthMiddleware;
use Framework\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;

class MessageController
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index() {

        $messages = Message::all('id', 'DESC');

        return view('messages.index', compact('messages'));
    }

    public function show($id) {
        $message = Message::find($id);

        if(!$message) {
            return response()->setContent('404')->send();
        }

        return view('messages.show', compact('message'));
    }

}