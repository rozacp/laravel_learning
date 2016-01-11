@extends('layouts.app')

@section('content')
    <div class="panel-heading">Write a new article</div>
    <div class="panel-body">

        {!! Form::open(['route' => 'articles.store', 'method' => 'post']) !!}

        @include('articles._form', [
            'tags' => $tags,
            'selected' => null,
            'button' => 'Add article',
            'date' => \Carbon\Carbon::now()
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