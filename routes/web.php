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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('subject')->middleware(['auth'])->group(function(){
    Route::get('/', 'SubjectController@Index')->name('subject.list');
    Route::post('/add', 'SubjectController@Create')->name('subject.add');
    Route::post('/delete', 'SubjectController@Delete')->name('subject.delete');   
    Route::get('/edit/{id}', 'SubjectController@Edit')->name('subject.edit');   
    Route::post('/edit/{id}', 'SubjectController@Update')->name('subject.update');   
});

Route::prefix('deck')->middleware(['auth'])->group(function(){
    Route::get('/', 'DeckController@Index')->name('deck.list');   
    Route::get('/add', 'DeckController@Create')->name('deck.create');
    Route::post('/add', 'DeckController@Store')->name('deck.store');
    Route::post('/action', 'DeckController@Action')->name('deck.action');
    Route::get('/edit/{id}', 'DeckController@Edit')->name('deck.edit');
    Route::post('/update/{id}', 'DeckController@Update')->name('deck.update');
    Route::post('/delete', 'DeckController@Destroy')->name('deck.delete');
    Route::get('/{id}', 'DeckController@Show')->name('deck.show');
});