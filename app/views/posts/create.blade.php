@extends('layouts.master')

@section('content')
    <h1>My  Laravel Blog</h1>
    <form  action="{{{ action('PostsController@store') }}}" method="POST">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" placeholder="title" value="{{{ Input::old('title') }}}">
        <br>

        <label for="body"> Post Body</label>
        <textarea  rows="4" cols="50" id="body" name="body">{{{ Input::old('body') }}}</textarea>
        <br>

        <button type="submit">Add Post</button>

    </form>

@stop