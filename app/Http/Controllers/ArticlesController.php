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

    /**
     * Show all articles, ordered by latest and filtered to current date
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //Auth::loginUsingId(1); // DEJ TO STRAN

        $articles = Article::latest('updated_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Display a single article
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Display article submition form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = $this->tagsList();

        return view('articles.create', compact('tags'));
    }

    /**
     * Store the article to the database, sync the tags, redirect with flash message.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($request, $article);

        return redirect()->route('articles.index')->with(['flash_info' => 'Article created successfully']);
    }

    /**
     * Display article edit form
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $this->authorize('isRightUser', $article);

        $tags = $this->tagsList();
        $selected = $article->tags()->lists('id')->all();

        return view('articles.edit', compact('article', 'tags', 'selected'));
    }

    /**
     * Update the article in the database
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('isRightUser', $article);

        $article->update($request->all());
        $this->syncTags($request, $article);

        return redirect()->route('articles.index')->with(['flash_info' => 'Article edited successfully']);
    }

    /**
     * Delete the article
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $this->authorize('isRightUser', $article);

        $article->delete();

        return redirect()->route('articles.index')->with(['flash_info' => 'Article deleted']);
    }

    /**
     * Sync the article tags
     *
     * @param $request
     * @param $article
     */
    private function syncTags($request, $article)
    {
        $article->tags()->sync($request->input('tags'));
    }

    /**
     * Get the article tag list
     *
     * @return mixed
     */
    private function tagsList()
    {
        $tags = Tag::lists('name', 'id');

        return $tags;
    }

}
