<?php


namespace App\Http\Controllers;


use App\Models\News;
use App\Validators\InsertNewsValidator;
use App\Validators\UpdateSettingsValidator;
use App\Validators\InsertPageValidator;
use Framework\Middlewares\AuthMiddleware;
use Symfony\Component\HttpFoundation\Request;

class NewsController
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index() {

        $pages = News::all('id', 'DESC');

        return view('news.index', compact('pages'));
    }

    public function create() {
        $title = 'Nova Notícia';

        return view('news.create-update', compact('title'));
    }

    public function store(Request $request) {
        $data = UpdateSettingsValidator::handle($request);

        $page = News::create($data);

        $file = $request->files->get('banner');

        if($file) {
            $page->uploadFile($file);
        }

        return redirect(router()->url('news.index'), ['status' => 'Notícia adicionada']);
    }

    public function edit($id)
    {
        $title = 'Editar Notícia';
        $page = News::find($id);

        return view('news.create-update', compact('title', 'page'));
    }

    public function update($id, Request $request) {
        $data = InsertNewsValidator::handle($request);
        $page = News::find($id);

        $page->update($data);

        $file = $request->files->get('banner');

        if($file) {
            $page->uploadFile($file);
        }


        return redirect(router()->url('news.index'), ['status' => 'Notícia editada']);
    }

    public function destroy($id, Request $request) {
        News::destroy($id);

        return redirect(router()->url('news.index'), ['status' => 'Notícia removida']);
    }
}