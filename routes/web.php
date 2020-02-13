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

Route::view('/', 'home')->name('home');

Route::get('jobs/search', 'JobController@filter')->name('jobs.search');



Route::get('/jobs', 'JobController@index')->name('jobs.index');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create')->middleware('auth');
Route::get('/jobs/{job}/edit', 'JobController@edit')->name('jobs.edit')->middleware('auth');
Route::patch('/jobs/{job}', 'JobController@update')->name('jobs.update')->middleware('auth');

Route::post('/jobs', 'JobController@store')->name('jobs.store')->middleware('auth');

Route::get('/jobs/{job}', 'JobController@show')->name('jobs.show');

Route::delete('/jobs/{job}', 'JobController@destroy')->name('jobs.destroy')->middleware('auth');
Route::get('/jobs/{job}/confirmDelete', 'JobController@confirmDelete')->name('jobs.confirmDelete')->middleware('auth');


Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
Route::post('/contacts', 'ContactController@store')->name('contacts.store');
Route::get('contacts/contact', 'ContactController@index')->name('contacts.index')->middleware('auth');
//Route::post('/contact', 'MessageController@store')->name('messages.store');
Route::delete('/contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy')->middleware('auth');
Route::get('/contacts/{contact}/showContactRequest', 'ContactController@showContactRequest')->name('contacts.showContactRequest')->middleware('auth');
Route::patch('/contacts/{contact}', 'ContactController@update')->name('contacts.update')->middleware('auth');


Route::get('jobs/like/{job}', 'JobController@toggleLike')->name('like_job');

Route::get('/likedjobs', 'UserController@indexLikedJobs')->name('likedjobs');

Route::get('jobs/apply/{job}', 'JobController@applyToJob')->name('applyToJob');


Route::get('/profile', 'UserController@show')->name('profile');

Route::patch('/profile', 'UserController@uploadCV')->name('profile.uploadCV');


Auth::routes();



