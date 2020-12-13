<?php


namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\Template;
use App\Validators\InsertPageValidator;
use Framework\Middlewares\AuthMiddleware;
use Framework\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;

class PageController
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index() {

        $pages = Page::all('id', 'DESC');

        return view('pages.index', compact('pages'));
    }

    public function create() {
        $title = 'Nova Página';
        $templates = Template::all();
        $pages = Page::all();

        return view('pages.create-update', compact('title', 'templates', 'pages'));
    }

    public function store(Request $request) {
        $data = InsertPageValidator::handle($request);

        $page = Page::create($data);

        $file = $request->files->get('banner');

        if($file) {
            $page->uploadFile($file);
        }


        return redirect(router()->url('pages.index'), ['status' => 'Página adicionada']);
    }

    public function edit($id) {
        $title = 'Editar Página';
        $templates = Template::all();
        $page = Page::find($id);
        $pages = Page::all();

        return view('pages.create-update', compact('title','page', 'templates', 'pages'));
    }

    public function update($id, Request $request) {
        $data = InsertPageValidator::handle($request);
        $page = Page::find($id);

        $page->update($data);

        $file = $request->files->get('banner');

        if($file) {
            $page->uploadFile($file);
        }

        return redirect(router()->url('pages.index'), ['status' => 'Página editada']);
    }

    public function destroy($id, Request $request) {
        Page::destroy($id);

        return redirect(router()->url('pages.index'), ['status' => 'Página removida']);
    }
}