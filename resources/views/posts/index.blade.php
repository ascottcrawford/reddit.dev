@extends('layouts.master')
@section('css')
	<link href="main.css" />
@stop
@section('content')
	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="row">  
	        <div class="col-xs-5">
	          <h3><p class="nav-title"><a href="/posts">Reddit.Dev</a></p></h3>
	        </div>
	        <div class="col-xs-3">
	        	<form>
	        		<h4>Search Bar</h4>
	        	</form>
	        </div>
	        <div class="col-xs-4"> 
	           <a class="navbar-right btn btn-default" href="{{ action('Auth\AuthController@getLogin')}}">Login</a>
	           <a class="navbar-right btn btn-default" href="{{ action('Auth\AuthController@getRegister')}}">Signup</a>
	           <a class="navbar-right btn btn-default"  href="{{ action('Auth\AuthController@getLogout')}}">Logout</a>
	        </div> 
	    </div>
	  </div>
	</nav>
	<h3><a href="{{ action('PostsController@create') }}">Create New Post</a></h3>
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Title</td>
				<td>URL</td>
				<td>Content</td>
				<td>Created At</td>
				<td>Created By</td>
				<td>Delete</td>
				<td>Edit</td>
				<td>Update</td>
			</tr>
		</thead>
		<tbody>
    	@foreach($posts as $post) 
    		<tr>
    		<td>{{ $post->title }}</td>
    		<td><a href="{{ $post->content }}">{{ $post->url }}</a></td>
    		<td>{{ $post->content }}</td>
    		<td>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
    		<td>{{ $post->name }}</td>
    		<td><form method="post" action="{{ action('PostsController@destroy', $post->id)}}">
    			{{ csrf_field() }}
    			{{ method_field("DELETE")}}
    			<button class="btn btn-danger">Delete</button>
    		</form></td>
    		<td><a href="{{ action('PostsController@edit', $post->id)}}">Edit</a></td>
    		<td><a href="{{ action('PostsController@show', $post->id)}}">Show</a></td>
    	    </tr>
    	@endforeach
 		</tbody>
 	</table>
    	{!! $posts->render() !!}
@stop