@extends('layouts.master')

@section('content')
    <div class="row">
        <form method="POST" action="{{ action('PostsController@store') }}">
                    {!! csrf_field() !!}
                    Title: <input type="text" name="title" value="{{ old('title') }}">
                    Content: <input type="text" name="content" value="{{ old('content') }}">
                    URL: <input type="text" name="url" value="{{ old('url') }}">
                    <input type="submit">
        </form>
    </div>
		<!-- check if a field has an error -->
		$errors->has('title')

		<!-- get an error by field name -->
		$errors->first('title')

		<!-- get an error by field name formatted within html -->
		$errors->first('title', '<span class="help-block">:message</span>')
@stop