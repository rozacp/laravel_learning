@extends('app')

@section('content')

    <h1>Some pplz if any</h1>

        @if (count($people))
        <h3>Da list:</h3>

        <ul>
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
        @endif
@stop

@section('footer')
    <hr>
    <p>Some footer crap</p>
@stop