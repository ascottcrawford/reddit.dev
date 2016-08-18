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
    		<tr>{{ $post->title }}</tr>
    		<tr>{{ $post->url }}</tr>
    		<tr>{{ $post->content }}</tr>
    	@endforeach
 		</tbody>
 	</table>
@stop