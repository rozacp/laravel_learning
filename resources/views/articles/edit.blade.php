@extends('layouts.app')

@section('content')
    <div class="panel-heading">Edit: {{ $article->title }}</div>
    <div class="panel-body">

        {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

        @include('articles._form', [
            'tags' => $tags,
            'selected' => $selected,
            'button' => 'Edit article',
            'date' => $article->published_at_form
            ])

        {!! Form::close() !!}

        @include('errors.list')
    </div>
@stop

@section('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script>
        $('select').select2();
    </script>
@stop