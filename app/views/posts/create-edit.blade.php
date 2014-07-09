@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2">

            @if ($errors->has('title'))
                {{ $errors->first('title', '<span class="help-block">:message</span>') }}<br>
            @endif

            @if ($errors->has('body'))
                {{ $errors->first('body', '<span class="help-block">:message</span>') }}<br>
            @endif

        </div>
    </div><! --/row -->

    <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2">

            @if (isset($post))
            <h1>Edit Post</h1>
            {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files' => true)) }}
            @else
            <h1> Enter new post </h1>
            {{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}
            @endif

            </div>
        </div><! --/row -->
<br />

    <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2">

            {{ Form::label('title', 'Title') }}
            {{ Form::text('title') }}

            {{ Form::file('image') }}

            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body') }}

               <input type="submit" value="submit" />

            {{ Form::close() }}

        </div>
    </div><! --/row -->
</div><! --/container -->

@stop