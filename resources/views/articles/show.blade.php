@extends('layouts.app')

@section('content')
    <div class="panel-heading">Articles</div>
    <div class="panel-body">
        <article>
            <a href="{{ route('articles.edit', [$article->id]) }}">Edit the article</a>
            <hr>
            <h2>{{ $article->title }}</h2>
            <div class="body">{{ $article->body }}</div>
            <p><b>Published at:</b> {{ $article->published_at }}</p>
            @if (! $article->tags->isEmpty())<p><b>Tags:</b>&nbsp;@foreach($article->tags as $tag) {{ $tag->name }}&nbsp; @endforeach @endif</p>

            {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete article') !!}
            {!! Form::close() !!}
        </article>
    </div>
@stop