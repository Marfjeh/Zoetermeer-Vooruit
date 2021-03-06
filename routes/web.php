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

Route::get("contact", "RoutingController@contact");
Route::get("welcome", "RoutingController@landing");
Route::get("/", "RoutingController@landing");
Route::get('/home/edit', 'RoutingController@editHome')->middleware('admin');
Route::post('/home/edit', 'RoutingController@saveHTML')->middleware('admin');
Route::get('/about/edit', 'RoutingController@editAbout')->middleware('admin');
Route::post('/about/edit', 'RoutingController@saveHTMLAbout')->middleware('admin');
Route::get("about", "RoutingController@about");

Route::group(['prefix'=>'quiz'], function() {
    Route::get('/', 'QuizController@view');
    Route::get('/{id}', 'QuestionController@view')->where('id', '[0-9]+');
    Route::post('/delete', 'QuizController@delete');
    Route::get('create', 'QuizController@add');
    Route::post('create', 'QuizController@store');
    Route::get('{id}/make', 'QuizController@make')->where('id', '[0-9]+');
    Route::post('{id}/make', 'ReplyController@make')->where('id', '[0-9]+');
    Route::get("{id}/statistics", "RoutingController@statistics")->where('id', '[0-9]+');
    Route::post('{id}/statistics', 'QuizController@statistics')->where('id', '[0-9]+');
});

Route::group(['prefix'=>'question'], function(){
	Route::get('/', 'QuestionController@view');
	Route::get('{id}', 'QuestionController@form')->where('id', '[0-9]+');
    Route::post('/{id}', 'QuestionController@edit')->where('id', '[0-9]+');
});

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/email', 'RoutingController@email');
