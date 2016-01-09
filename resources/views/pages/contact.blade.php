@extends('layouts.app')

@section('content')

    <div class="panel-heading">Contact</div>
    <div class="panel-body">

        @if (count($people))
        <h2>Da list:</h2>

        <ul>
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
        @endif
    </div>
@stop

@section('footer')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Footer</div>
                <div class="panel-body">
                    <p>Some footer crap</p>
                </div>
            </div>
        </div>
    </div>
@stop