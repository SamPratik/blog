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

// Route::get('/', function () {
//     return view('welcome');
// });

/***********Page Controller********/
Route::get('/', 'PageController@home')->name('public_home');
Route::get('about', 'PageController@getAbout')->name('about');
Route::get('contact', 'PageController@getContact')->name('contact');
Route::post('contact', 'PageController@sendMail');
Route::get('test', 'PageController@getIndex');

/***********Post Controller********/
Route::resource('posts', 'PostController');

/********Authentication Routes*********/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/***********Blog Controller********/
Route::get('blog/{slug}', 'BlogController@single')->name('blog.single');
Route::get('blog', 'BlogController@index')->name('blog.index');

/**********category routes***********/
Route::resource('categories', 'CategoryController', ['except' => [
    'create'
]]);

/**********tag routes********/
Route::resource('tags', 'TagController', [
  'except' => ['create']
]);

/*********Comment Routes**********/
Route::get('comments/delete/{comment}', 'CommentController@delete')->name('comments.delete');
Route::resource('comments', 'CommentController', ['except' => [
    'index', 'create', 'show'
]]);
?>
