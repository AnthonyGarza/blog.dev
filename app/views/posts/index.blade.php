@extends('layouts.master')

@section('content')



<div class="container">
    <div class="col-lg-12 text-right">
        {{ link_to_action('PostsController@create', 'Create New Post') }}
    </div>
    <div class="text-left">


        <table class="table">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Creation Date</th>
            <th>Actions</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ link_to_action('PostsController@show', $post->title, array($post->id)) }}</td>
            <td>{{{ $post->user->email }}}</td>
            <td>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
            <td>{{ link_to_action('PostsController@edit', 'Edit', array($post->id)) }}</td>
        </tr>
        @endforeach
        <hr />
        </table>
    </div>

    {{ $posts->links() }}

    {{ Form::open(array('action' => 'PostsController@index', 'method' => 'GET')) }}

    {{ Form::text('search') }}

    <input type="submit" value="Search">

    {{ Form::close() }}

</div>

@stop