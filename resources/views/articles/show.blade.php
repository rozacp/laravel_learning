@extends('app')

@section('content')
    <h1>{{ $article->title }}</h1>

    <hr>
        <div class="body">{{ $article->body }}</div>

@stop