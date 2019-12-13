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

Auth::routes();
Route::view('/login', 'welcome')->name('login');
Route::view('/register', 'welcome');
Route::get('/home', function(){
    if(Auth::user() && Auth::user()->businessOwner) {
        return redirect('/businessOwner');
    }else if(Auth::user() && Auth::user()->businessInvestor) {
        return redirect('/businessInvestor');
    }
    else {
        return redirect('/');
    }
})->name('home');

Route::middleware(['auth:web'])->get('/add/business', 'HomeController@index');;
Route::middleware(['auth:web', 'businessOwner'])->get('/businessOwner/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessOwner'])->get('/businessOwner', 'HomeController@index');

Route::middleware(['auth:web', 'businessInvestor'])->get('/businessInvestor/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessInvestor'])->get('/businessInvestor', 'HomeController@index');
Route::view('/{path?}', 'welcome');
Route::view('/business/{path?}', 'welcome');
Route::view('/search/{path?}', 'welcome');
