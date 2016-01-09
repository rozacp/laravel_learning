@extends('layouts.app')

@section('content')

    <div class="panel-heading">About</div>
    <div class="panel-body">

        <h2>About me: {{ $first }} {{ $last }}</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi at est exercitationem id illum modi nostrum numquam quaerat ut!</p>
    </div>
@stop