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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['web', 'auth','isAdmin']], function () {
    /* Books */
    Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
        Route::resource('', 'BookController')->parameters(['' => 'book']);
        Route::post('import', [
            'as' => 'import',
            'uses' => 'BookController@postImport'
        ]);
    });
});
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['web', 'auth']], function () {
    /* Subscription */
    Route::group(['prefix' => 'subscribe', 'as' => 'subscribe.'], function () {
        Route::resource('', 'BookSubscriptionController')->parameters(['' => 'subscribe']);
    });
});

