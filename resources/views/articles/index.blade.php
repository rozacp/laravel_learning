@extends('app')

@section('content')
    <h1>Articles</h1>

    <a href="{{ route('articles.create') }}">Add a new article</a>

    @foreach($articles as $article)

        <article>
            <h2>
                <a href="{{ route('articles.show', [$article->id]) }}">{{ $article->title }}</a>
            </h2>
            <div class="body">{{ $article->body }}</div>
            <p>Published at: {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</p>
        </article>
        <hr>
    @endforeach
@stop