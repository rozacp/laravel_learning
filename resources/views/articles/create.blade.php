@extends('layouts.app')

@section('content')
    <div class="panel-heading">Write a new article</div>
    <div class="panel-body">

        {!! Form::open(['route' => 'articles.store', 'method' => 'post']) !!}

        @include('articles.form', [
            'tags' => $tags,
            'selected' => null,
            'button' => 'Add article',
            'date' => \Carbon\Carbon::now()
            ])

        {!! Form::close() !!}

        @include('errors.list')
    </div>
@stop