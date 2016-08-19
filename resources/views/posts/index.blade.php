@extends('layouts.master')

@section('content')
	<h1>Reddit.Dev</h1>
	<h3><a href="{{ action('PostsController@create') }}">Create New Post</a></h3>
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Title</td>
				<td>URL</td>
				<td>Content</td>
				<td>Created At</td>
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