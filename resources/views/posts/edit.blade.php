@extends('layouts.master')

@section('content')
    <h1>Edit Post</h1>
    <div class="container-fluid">
        
        <dl>
            <dt>Title</dt>
            <dd>{{ $post->title }}</dd>
            <dt>url</dt>
            <dd>{{ $post->url }}</dd>
            <dt>Content</dt>
            <dd>{{ $post->content }}</dd>
         </dl>
        <div class="row">
            <form method="POST" action="{{ action('PostsController@update', $post->id) }}">
                        {!! csrf_field() !!}
                        {{ method_field("PUT")}}
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