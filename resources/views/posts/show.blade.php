@extends('layouts.master')

@section('content')
	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="row">  
	        <div class="col-xs-4">
	          <h3><p class="nav-title"><a href="/posts">Reddit.Dev</a></p></h3>
	        </div>
	        <div class="col-xs-8"> 
	           <button type="submit" class="navbar-right btn btn-default">Login</button>
	           <button type="submit" class="navbar-right btn btn-default">Signup</button>
	           <button type="submit" class="navbar-right btn btn-default">Logout</button>
	        </div> 
	    </div>
	  </div>
	</nav>
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