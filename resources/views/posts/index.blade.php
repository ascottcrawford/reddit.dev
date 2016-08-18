@extends('layouts.master')

@section('content')
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Title</td>
				<td>URL</td>
				<td>Content</td>
			</tr>
		</thead>
		<tbody>
    	@foreach($posts as $post) 
    		<tr>
    		<td>{{ $post->title }}</td>
    		<td>{{ $post->url }}</td>
    		<td>{{ $post->content }}</td>
    		</tr>
    	@endforeach
 		</tbody>
 	</table>
@stop