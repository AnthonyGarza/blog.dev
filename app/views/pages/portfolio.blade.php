@extends('layouts.master')

@section('content')
    <h1>My Portfolio</h1>
    <a href="{{{ action('HomeController@showResume') }}}">Go to RESUME</a>
@stop