<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// The homepage
Route::get('/', function () {

    // Returning the file resources\views\posts.blade.php
    // where 'Post::all()' is inserted at the place of
    // $posts
    return view('posts',
    ['posts' =>  Post::all() ]
    );

});

// The page where posts are displayed
Route::get('posts/{postId}', function ($id) {

  // Returning the file at resources\views\posts.blade.php
  // where the variable $post contains 'Post::findOrFail($id)'
  return view('post',
  ['post' =>  Post::findOrFail($id)]);

});

// The route to the register page
// at resources\views\register\create.blade.php
Route::get('/register',
[RegisterController::class,'create'])
->middleware('guest');
// This page is only accessible to guests,
// hence '->middleware('guest')

// Validate, store and log in the user after registration
Route::post('/register' ,
[RegisterController::class, 'validateStoreAndLogin'])
->middleware('guest');
// This form action is only for those
// that are not authenticated/logged in
// hence '->middleware('guest')

// Logout the user/destroy session
Route::get('/logout',
[SessionsController::class,'destroy'])
->middleware('auth');
// Only authenticated/logged in users
// can log out, hence '->middleware('auth')


// The login form
// Takes us to the login page
Route::get('/login',
[SessionsController::class,'login'])
->middleware('guest');
// Only those users that are not
// logged in/not authenticated can
// access the login page and use
// the login form

// Creating a session/logging in user
// from typed in credentials
Route::post('/login',
[SessionsController::class,'create'])
->middleware('guest');
// This action of logging in
// the user is only for those
// not logged in/not authenticated
// hence '>middleware('guest')'

