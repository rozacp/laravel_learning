<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //Auth::loginUsingId(1); // DEJ TO STRAN

        $articles = Article::latest('updated_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = $this->tagsList();

        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($request, $article);

        return redirect()->route('articles.index')->with(['flash_info' => 'Article created successfully']);
    }

    public function edit(Article $article)
    {
        $this->authorize('isRightUser', $article);

        $tags = $this->tagsList();
        $selected = $article->tags()->lists('id')->all();

        return view('articles.edit', compact('article', 'tags', 'selected'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('isRightUser', $article);

        $article->update($request->all());
        $this->syncTags($request, $article);

        return redirect()->route('articles.index')->with(['flash_info' => 'Article edited successfully']);
    }

    public function destroy(Article $article)
    {
        $this->authorize('isRightUser', $article);

        $article->delete();

        return redirect()->route('articles.index')->with(['flash_info' => 'Article deleted']);
    }

    private function syncTags($request, $article)
    {
        $article->tags()->sync($request->input('tags'));
    }

    private function tagsList()
    {
        $tags = Tag::lists('name', 'id');

        return $tags;
    }

}
