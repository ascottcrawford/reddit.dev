@extends('layouts.master')

@section('content')
	<h1>Hello, {{ $firstName }} {{ $lastName }}!</h1>

	@if ($firstName == 'cameron')
		{{ $lastName }}

	@else
		<strong>{{ $last }}</strong>
	@endif
	@foreach ($adjectives as $adjective)
		<h1>{{ $adjective }}</h1>
	@endforeach

@stop
@section('scripts')
@stop

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>Hello, <?= $firstName ?><?= $lastName ?></h1>
</body>
</html>

