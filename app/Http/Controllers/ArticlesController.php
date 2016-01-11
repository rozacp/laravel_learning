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
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::latest('published_at')->get(); //->published()

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
        $article->tags()->attach($this->tagsInput($request));

        return redirect()->route('articles.index')->with(['flash_info' => 'Article created successfully']);
    }

    public function edit(Article $article)
    {
        $tags = $this->tagsList();
        $selected = $article->tags()->lists('id')->all();

        return view('articles.edit', compact('article', 'tags', 'selected'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->tags()->sync($this->tagsInput($request));

        return redirect()->route('articles.index')->with(['flash_info' => 'Article edited successfully']);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with(['flash_info' => 'Article deleted']);
    }

    /**
     * Tag list to pupulate form
     * @return mixed
     */
    private function tagsList()
    {
        $tags = Tag::lists('name', 'id');

        return $tags;
    }

    /**
     * Tag id's from input form
     * @param ArticleRequest $request
     * @return array|string
     */
    private function tagsInput(ArticleRequest $request)
    {
        return $request->input('tags');
    }
}
