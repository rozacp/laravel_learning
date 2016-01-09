@extends('layouts.app')

@section('content')
    <div class="panel-heading">Articles</div>
    <div class="panel-body">
        <article>
            <a href="{{ route('articles.edit', [$article->id]) }}">Edit the article</a>
            <hr>
            <h2>{{ $article->title }}</h2>
            <div class="body">{{ $article->body }}</div>
            <p>Published at: {{ $article->published_at }}</p>

            {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete article') !!}
            {!! Form::close() !!}
        </article>
    </div>
@stop