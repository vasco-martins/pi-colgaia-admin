<?php


namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\Template;
use App\Models\User;
use App\Validators\CreateUserValidator;
use App\Validators\InsertPageValidator;
use Framework\Helpers\Hash;
use Framework\Middlewares\AuthMiddleware;
use Framework\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index() {

        $users = User::all('id', 'DESC');

        return view('users.index', compact('users'));
    }

    public function create() {
        $title = 'Novo utilizador';

        return view('users.create-update', compact('title', ));
    }

    public function store(Request $request) {
        $data = CreateUserValidator::handle($request);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return redirect(router()->url('users.index'), ['status' => 'Utilizador Criado']);
    }

    public function edit($id) {
        $title = 'Editar Utilizador';

        $user = User::find($id);

        return view('users.create-update', compact('title','user'));
    }

    public function update($id, Request $request) {
        $data = CreateUserValidator::handle($request);
        $user = User::find($id);

        if(array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect(router()->url('users.index'), ['status' => 'Utilizador atualizado']);
    }

    public function destroy($id, Request $request) {
        User::destroy($id);

        return redirect(router()->url('users.index'), ['status' => 'Utilizador removido']);
    }
}