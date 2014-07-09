@extends('layouts.master')

@section('content')

<h1> Edit post </h1>

@if ($errors->has('title'))
	{{ $errors->first('title', '<span class="help-block">:message</span>') }}<br>
@endif

@if ($errors->has('body'))
	{{ $errors->first('body', '<span class="help-block">:message</span>') }}<br>
@endif
<br />

{{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}

	{{ Form::label('title', 'Title') }}
	{{ Form::text('title') }}

	{{ Form::label('body', 'Body') }}
	{{ Form::text('body') }}

	<input type="submit" value="submit" />

{{ Form::close() }}

@stop