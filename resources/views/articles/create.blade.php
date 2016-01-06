@extends('app')

@section('content')

    <h1>Write a new article</h1>

    {!! Form::open(['route' => 'articles.store', 'method' => 'post']) !!}

    @include('articles.form', ['button' => 'Add article', 'date' => \Carbon\Carbon::now()])

    {!! Form::close() !!}

    @include('errors.list')
@stop