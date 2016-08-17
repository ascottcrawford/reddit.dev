@extends('layouts.master')

@section('content')
    <div class="posts">
    	@foreach($posts as $post) 
    		<a href="{{ action('PostsController@show', $post->id) }}">Post #{{ $post->title }}</a>
    	@endforeach
        
    </div>
@stop