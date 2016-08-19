@extends('layouts.master')

@section('content')
	<div class="row">
			<div class="col-sm-12">
				<h1>{{ $post->title }} </h1>
				<p><a href="{{ $post->url }}">{{ $post->url }}</a><p>
				<p>{{ $post->content }}</p>
	</div>
	<div class="col-sm-12">
			<p><a href="{{ action('PostsController@edit', $post->id)}}">Edit</p>
			<form method="post" action="{{ action('PostsController@destroy', $post->id)}}">
    			{{ csrf_field() }}
    			{{ method_field("DELETE")}}
    			<button class="btn btn-danger">Delete</button>
    		</form>
    </div>

@stop