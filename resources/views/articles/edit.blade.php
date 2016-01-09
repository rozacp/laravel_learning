@extends('layouts.app')

@section('content')
    <div class="panel-heading">Edit: {{ $article->title }}</div>
    <div class="panel-body">

        {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

        @include('articles.form', [
            'button' => 'Edit article',
            'date' => \Carbon\Carbon::parse($article->getOriginal('published_at'))->format('Y-m-d')
            ])

        {!! Form::close() !!}

        @include('errors.list')
    </div>
@stop