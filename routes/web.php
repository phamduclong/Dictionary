<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home',['as'=>'home','uses'=>'MyController@Index']);
Route::post('handleTranToVi',['as'=> 'handleTranToVi' , 'uses'=> 'MyController@handleTranToVi']);


Route::get('practive',['as'=>'practive','uses'=>'MyController@practive']);
Route::post('handleAnswer',['as' => 'handleAnswer','uses' => 'MyController@handleAnswer']);
Route::get('list-vocabulary',['as'=> 'list-vocabulary','uses'=>'MyController@getListVocabulary']);
Route::get('add-vocabulary/{id}',['as'=> 'add-vocabulary' , 'uses'=> 'MyController@addVocabulary']);


Route::get('prativeListening',['as'=>'practiveListening','uses'=>'MyController@practiveListening']);
Route::get('gameMatchWords', ['as' => 'gameMatchWords', 'uses' => 'MyController@gameMatchWords']);
Route::get('gameGhepChu', ['as' => 'gameGhepChu', 'uses' => 'MyController@gameGhepChu']);
Route::get('gameLatOChu', ['as' => 'gameLatOChu', 'uses' => 'MyController@gameLatOChu']);




