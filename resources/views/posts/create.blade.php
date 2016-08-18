@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ action('PostsController@store') }}">
                        {!! csrf_field() !!}
                        Title: <input type="text" name="title" value="{{ old('title') }}">
                        @if($errors->has('title'))
    			    		{!! $errors->first('title', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

                        Content: <input type="text" name="content" value="{{ old('content') }}">
                        @if($errors->has('content'))
    			    		{!! $errors->first('content', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

                        URL: <input type="text" name="url" value="{{ old('url') }}"> 
                        @if($errors->has('url'))
    			    		{!! $errors->first('url', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif
                        <input type="submit" class="button">                  
            </form>
        </div>    
    </div>
@stop