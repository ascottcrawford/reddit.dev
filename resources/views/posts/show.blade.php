@extends('layouts.master')

@section('content')
	<dl>
			<dt>Title</dt>
			<dd>{{ $post->title }}</dd>
			<dt>url</dt>
			<dd>{{ $post->url }}</dd>
			<dt>Content</dt>
			<dd>{{ $post->content }}</dd>
    </dl>

@stop