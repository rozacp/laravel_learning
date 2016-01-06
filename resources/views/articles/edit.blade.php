@extends('app')

@section('content')

    <h1>Edit an existing article: {{ $article->title }}</h1>

    <form action="{{ route('articles.update', [$article->id]) }}" method="post">

        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div>
            <label for="title">Task title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?: $article->title }}">
        </div>

        <div>
            <label for="body">Task body:</label>
            <textarea name="body" id="body" cols="30" rows="10">{{ old('body') ?: $article->body }}</textarea>
        </div>

        <div>
            <label for="published_at">Published at:</label>
            <input type="date" name="published_at" id="published_at" value="{{ \Carbon\Carbon::parse($article->published_at)->format('Y-m-d') }}">
        </div>

        <div>
            <input type="submit" value="Edit article">
        </div>
    </form>

    @include('errors.error')
@stop