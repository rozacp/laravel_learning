@extends('layouts.app')

@section('content')
    <div class="panel-heading">Articles</div>
    <div class="panel-body">
        <article>
            @can('isRightUser', $article)
            <a href="{{ route('articles.edit', [$article->id]) }}">Edit the article</a>
            @endcan
            <hr>
            <h2>{{ $article->title }}</h2>
            <div class="body">{{ $article->body }}</div>
            @include('articles._details')

            @can('isRightUser', $article)
            {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete article') !!}
            {!! Form::close() !!}
            @endcan
        </article>
    </div>
@stop