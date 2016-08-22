@extends('layouts.master')

@section('content')
	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="row">  
	        <div class="col-xs-4">
	          <h3><p class="nav-title"><a href="/posts">Reddit.Dev</a></p></h3>
	        </div>
	        <div class="col-xs-8"> 
	           <a class="navbar-right btn btn-default" href="{{ action('Auth\AuthController@getLogin')}}">Login</a>
	           <a class="navbar-right btn btn-default" href="{{ action('Auth\AuthController@getRegister')}}">Signup</a>
	           <a class="navbar-right btn btn-default"  href="{{ action('Auth\AuthController@getLogout')}}">Logout</a>
	        </div> 
	    </div>
	  </div>
	</nav>
	<h1>Login</h1>
	<form method="post" action="{{ action('Auth\AuthController@postLogin') }}">
		{{ csrf_field() }}
		<div class="form-group">
				<label for="email">Username</label>
				<input
						type="text"
						class="form-control"
						name="email"
						id="email">
				@include('forms.error', ['field' => 'email'])		
		</div>
		<div class="form-group">
				<label for="password">Password</label>
				<input	
						type="text"
						class="form-control"
						name="password"
						id="password">
				@include('forms.error', ['field' => 'password'])	
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>	


@stop
