<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Controllers\Controller;

class TagsController extends Controller {

    public function show($tag)
    {
        $tag = Tag::where('name', $tag)->firstOrFail();
        $articles = $tag->articles;

        return view('articles.index', compact('articles'));
    }
}
