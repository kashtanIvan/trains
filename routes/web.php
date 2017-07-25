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
//
//Route::get('/', function () {
//    return view('layouts.app');
//});
Route::resource('/', 'TrainController');
Route::get('train/{id}', 'TrainController@show')->name('train');
//Route::get('train/cr', ['as' => 'addTrain', 'uses' => 'Controller@create']);

Route::get('/add', ['as' => 'addTrain', 'uses' => 'AddTrainController@index']);
Route::post('/add', ['as' => 'addTrain', 'uses' => 'AddTrainController@addTrain']);
Route::get('/delete/{id}', ['as' => 'delete', 'uses' =>'AddTrainController@delete']);
Route::get('/test', ['as' => 'test', 'uses' =>'Controller@test']);


Route::get('/file', ['as' => 'file', 'uses' =>'FileController@index']);

