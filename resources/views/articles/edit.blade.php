@extends('app')

@section('content')

    <h1>Edit an existing article: {{ $article->title }}</h1>

    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

    @include('articles.form', ['button' => 'Edit article', 'date' => null])

    {!! Form::close() !!}

    @include('errors.list')
@stop