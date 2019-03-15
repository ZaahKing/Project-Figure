<?php

Route::pattern('id', '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'HomeController@Settings')->name('settings');
Route::get('/about', 'InfoController@About')->name('about');
Route::get('/contacts', 'InfoController@Contacts')->name('contacts');
Route::get('/me', 'InfoController@Portfolio')->name('me');

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
    Route::post('/delete/many', 'DeckController@DestroyMany')->name('deck.delete.many');
    Route::get('/{id}', 'DeckController@Show')->name('deck.show');
});

Route::prefix('pair')->middleware(['auth'])->group(function(){
    Route::get('/', 'PairController@Index')->name('pair.list');
    Route::post('/add/deck-{id}', 'PairController@Store')->name('pair.store');
    Route::get('/edit/{id}', 'PairController@Edit')->name('pair.edit');
    Route::post('/update/{id}', 'PairController@Update')->name('pair.update');
    Route::post('/delete', 'PairController@Destroy')->name('pair.delete');
    Route::post('/join', 'PairController@Join')->name('pair.join');
});

Route::prefix('test')->middleware(['auth'])->group(function(){
    Route::post('/', 'TestController@MassTest')->name('test.mass');
    Route::post('/revers', 'TestController@MassRevers')->name('test.mass.revers');
    Route::get('/{id}', 'TestController@Test')->name('test');
    Route::get('/revers/{id}', 'TestController@Revers')->name('test.revers');
});

Route::prefix('learning')->middleware(['auth'])->group(function(){
    Route::post('/', 'TestController@MassLearning')->name('learning.mass');
    Route::get('/{id}', 'TestController@Learning')->name('learning');
});
