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
    return view('welcome', [

    ]);
});

Route::get('/newProject', function () {
    return view('newProject');
});


Route::get('/projectTeam', function () {
    return view('projectTeam');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('insert','ProjectController@insertform');
Route::post('create','ProjectController@insert');

Route::get('insertTeam','TeamController@insertformTeam');
Route::post('createTeam','TeamController@insertTeam');
