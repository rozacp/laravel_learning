@extends('app')

@section('content')

    <h1>Edit an existing article: {{ $article->title }}</h1>

    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

    @include('articles.form', [
        'button' => 'Edit article',
        'date' => \Carbon\Carbon::parse($article->getOriginal('published_at'))->format('Y-m-d')
        ])

    {!! Form::close() !!}

    @include('errors.list')
@stop