@extends('app')

@section('content')
    <article>
        <h1>{{ $article->title }}</h1>
        <div class="body">{{ $article->body }}</div>
        <p>Published at: {{ $article->published_at }}</p>
        <hr>
        <a href="{{ route('articles.edit', [$article->id]) }}">Edit the article</a>

        <form action="{{ route('articles.destroy', [$article->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" value="Delete article">
        </form>
    </article>
@stop