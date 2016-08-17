<?php
use App\Post;
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

// Route::get('/rolldice/{guessnumber}', function($guessnumber)
// {
//     $dicenumber = rand(1, 6);

//     $data = [
//     	'dicenumber' => $dicenumber,
//     	'guessnumber' => $guessnumber
//     ];

//     // multiple values
//     return view('roll-dice')->with($data);
  
// });

Route::get('/', 'HomeController@showWelcome');

Route::get('/rolldice/{guess}', 'HomeController@rollDice');

Route::get('/uppercase/{word?}', 'HomeController@uppercase');

Route::get('/increment/{number?}', 'HomeController@increment');

Route::resource('posts', 'PostsController');
// Route::get('/posts', 'PostsController@index');
// Route::get('/posts/create', 'PostsController@create');
// Route::post('/posts', 'PostsController@store');
// Route::get('/posts/{post}', 'PostsController@show');
// Route::get('/posts/{post}/edit', 'PostsController@edit');
// Route::put('/posts/{post}', 'PostsController@update');
// Route::delete('/posts/{post}', 'PostsController@destroy');

Route::get('orm-test', function ()
{
    $post1 = new Post();
	$post1->title = 'Eloquent is awesome!';
	$post1->url='https://laravel.com/docs/5.1/eloquent';
	$post1->content  = 'It is super easy to create a new post.';
	$post1->created_by = 1;
	$post1->save();

	$post2 = new Post();
	$post2->title = 'Eloquent is really easy!';
	$post2->url='https://laravel.com/docs/5.1/eloquent';
	$post2->content = 'It is super easy to create a new post.';
	$post2->created_by = 1;
	$post2->save();
});
// Route::post('/test-route', function(Request $request) {
// 	dd($request->all());
// });

// Route::post('/create', function(Request $request) {
// 	dd($request->all());
// });



// Route::get('/rolldice/{guessnumber}', function($guessnumber)
// {
//     $dicenumber = rand(1, 6);

//     $data = [
//     	'dicenumber' => $dicenumber,
//     	'guessnumber' => $guessnumber
//     ];

//     // multiple values
//     return view('roll-dice')->with($data);
  
// });


// ', function($name)
// 	{
// 	   	$upper = strtoupper($name);
// 	   	$data = [
// 	   		'upper' => $upper
// 	   	];
// 	   	return view('uppercase')->with($data);
// 	});

// // Route::get('/uppercase/{name}', function($name)
// // {
// //     if ($name == "Chris") {
// //         return redirect('/');
// //     }
// //     $uppercase = strtoupper($name);
// //     return $uppercase;
// // });

// // Route::get('/add/{number}', function($number)
// // {
// //     return $number + 1;
// // });
