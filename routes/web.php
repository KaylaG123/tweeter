<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('marketing.index');
});

Route::get('marketing', function(){
    return view('marketing.index');
});

Route::middleware('auth')->group(function() {
    Route::resource('/tweets', 'TweetController');
});

Route::get('/tweets/{tweet}/like', 'TweetController@like');
Route::resource('/tweets', 'TweetController');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authtest', function() {
    $user = Auth::user();
    echo 'THe logged in user is' . $user->name . 'and their email is' . $user->email;
});

Route::post('/tweets/create', function() {
    //validate the project

    //save the project

    flash('message', 'Tweet successfully created!');

    //redirect('/tweets/')->with('message', 'Your project has been created');
});


Route::get('/users', 'UserController@index');
Route::post('/toggle', 'UserController@toggle');

//
// Route::get('/tweets', 'TweetController@index');
// Route::get('/tweets/create', 'TweetController@create');
// Route::get('/tweets/{tweet}/edit', 'TweetController@edit');
// Route::get('/tweets/{tweet}', 'TweetController@show');
// Route::post('/tweets', 'TweetController@store');
// Route::put('/tweets/{tweet}', 'TweetController@update');
// Route::delete('/tweets/{tweet}', 'TweetController@destroy', function() {
//     return redirect('/tweets');
// });
Route::resource('/tweets', 'TweetController');
Route::resource('/comments', 'CommentController');
Route::get('/comments/create/{tweet}', 'CommentController@create');

Route::resource('/profile', 'ProfileController');
Route::get('/users/profile/{user}', 'ProfileController@index')->name('user_profile');
Route::get('/users/profile', function() {
    return redirect('/users/profile/' . Auth::user()->id);
});
Route::resource('/users', 'UserController');

Route::get('/profile/profileimage/{filename}', 'ProfileController@store');

Route::get('/users/profile/{user}/edit', 'ProfileController@edit')->name('user_profile');
Route::put('/users/profile/{user}', 'ProfileController@update');

Route::get('/latest', 'TweetController@list');
