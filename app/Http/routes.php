<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// function view($relativePath, $data)

// Route::get('/sayhello/{first_name}/{last_name?}', function ($foo, $name = 'World') {
// 	return 'Hello Kings ' . $name1 . " and " . $name2;
// });

// Route::get('/sayhello/{first_name}/{last_name}', function($name)
// {
//     if ($name == "Chris") {
//         return redirect('/');
//     }

//     $data = [
//     	'firstName' => $foo,
//     	'lastName' => $name,
//     ];

//     return view('my-first-view')->with('firstName', $foo); //single value
//     // multiple values
//     return view('my-first-view')->with($data);
//     return view('my-first-view'), $data;
// });

Route::get('/rolldice/{guessnumber}', function($guessnumber)
{
    $dicenumber = rand(1, 6);

    $data = [
    	'dicenumber' => $dicenumber,
    	'guessnumber' => $guessnumber
    ];

    // multiple values
    return view('roll-dice')->with($data);
  
});

// Route::get('/uppercase/{name}', function($name)
// {
//     if ($name == "Chris") {
//         return redirect('/');
//     }
//     $uppercase = strtoupper($name);
//     return $uppercase;
// });

// Route::get('/add/{number}', function($number)
// {
//     return $number + 1;
// });
