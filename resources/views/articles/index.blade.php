@extends('layouts.app')

@section('content')
    <div class="panel-heading">Articles</div>
    <div class="panel-body">

        <a href="{{ route('articles.create') }}">Add a new article</a>

        @foreach($articles as $article)
            <hr>
            <article>
                <h2>
                    <a href="{{ route('articles.show', [$article->id]) }}">{{ $article->title }}</a>
                </h2>
                <div class="body">{{ $article->body }}</div>
                @include('articles._details')
            </article>
        @endforeach
    </div>
@stop