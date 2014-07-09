@extends('layouts.master')


@section('content')

<div class="container">

    <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2">

            @if ($errors->has('email'))
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}<br>
            @endif

            @if ($errors->has('password'))
                {{ $errors->first('password', '<span class="help-block">:message</span>') }}<br>
            @endif


        </div>
    </div>

    {{ Form::open(array('action' => 'HomeController@doLogin', 'class'=>'form-signin')) }}
    {{ Form::text('email') }}
    {{ Form::password('password') }}
    <input type="submit" value="Login">
    {{ Form::Close() }}

</div>

@stop