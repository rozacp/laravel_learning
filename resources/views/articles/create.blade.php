@extends('app')

@section('content')

    <h1>Write a new article</h1>

    <form action="{{ route('articles.store') }}" method="post">

        {!! csrf_field() !!}

        <div>
            <label for="title">Task title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="body">Task body:</label>
            <textarea name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
        </div>

        <div>
            <label for="published_at">Published at:</label>
            <input type="date" name="published_at" id="published_at" value="{{ date('Y-m-d') }}">
        </div>

        <div>
            <input type="submit" value="Add article">
        </div>
    </form>

    @include('errors.error')
@stop