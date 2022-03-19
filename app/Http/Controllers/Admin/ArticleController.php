<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Blog\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::withTrashed()->get();

        return view('admin.articles', compact('articles'));
    }


    public function create()
    {
        return view('admin.forms.create-article');
    }

    public function store(ArticleRequest $request): \Illuminate\Http\RedirectResponse
    {
        Article::create(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        );

        return redirect()->route('admin.articles.index')
            ->with('success','Статья сохранена');
    }

    public function show(int $id)
    {

    }

    public function edit($id)
    {
        $article = Article::whereId($id)->first();

        return view('admin.forms.edit-article', compact('article'));
    }

    public function update(ArticleRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Article::find($id)->setAttributes(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        )->save();

        return redirect()->route('admin.articles.index')
            ->with('success','Статья обновлена');
    }

    public function destroy(int $articleId, int $type): \Illuminate\Http\RedirectResponse
    {
        $type ? Article::whereId($articleId)->delete()
            : Article::whereId($articleId)->forceDelete();

        return redirect()->back()
            ->with('success','Статья скрыта');
    }

    public function restore($id): \Illuminate\Http\RedirectResponse
    {
        Article::whereId($id)->restore();

        return redirect()->back()
            ->with('success','Статья восстановлена');
    }
}
