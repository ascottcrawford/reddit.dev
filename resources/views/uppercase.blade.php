@extends('layouts.master')

@section('content')
	<h1>Hello, {{ $word }}!</h1>

	<p>
		<a href="{{ action('HomeController@uppercase', 'kings')}}">
			Uppercase Kings
		</a>
	</p>

@stop



