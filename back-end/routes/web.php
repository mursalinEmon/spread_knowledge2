<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});


Auth::routes(['verify'=>true]);
Route::get('/logout', function () {
    //logout user
    Auth::logout();
    // redirect to homepage
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

// Blog Portal
Route::middleware(['verified'])->group(function(){
    Route::get('/create-post','BlogPostController@create')->name('blogpost.create');
    Route::post('/create-post','BlogPostController@store')->name('store-post');
    Route::get('/post-list','BlogPostController@post_list')->name('blogpost.list');
    Route::post('/delete-post','BlogPostController@delete_post')->name('blogpost.delete');
    Route::post('/edit-post','BlogPostController@edit_post')->name('blogpost.edit');
    Route::post('/update-post','BlogPostController@update_post')->name('blogpost.update');
    Route::get('/fetch-tags','BlogPostController@index')->name('tags.fetch');
});

// Blog Tags
Route::middleware(['verified'])->group(function(){
    Route::get('/tags-create','BlogTagController@create')->name('tag.create');
    Route::post('/tags-create','BlogTagController@store')->name('tag.post');
    Route::get('/tags-list','BlogTagController@all_tags')->name('tag.list');
    Route::get('/blogTags/{blogTag}','BlogTagController@edit')->name('tag.edit');
    Route::post('/blogTags-update','BlogTagController@update')->name('tag.update');
    Route::post('/blogTags-delete','BlogTagController@delete_tag')->name('tag.delete');
});

//Courses
Route::middleware(['verified'])->group(function(){
    Route::get('/course-create','CourseController@create')->name('course.create');
    Route::post('/course-create','CourseController@store');
});


Route::get('/contributor_dashboard','HomeController@contributor_dashboard')->name('contributor_dashboard');
Route::get('/student-dashboard','StudentProfileController@index')->name('student.dashboard');
