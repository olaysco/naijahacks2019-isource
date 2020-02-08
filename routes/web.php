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
Route::get('/home', function () {
    if (Auth::user() && Auth::user()->owner) {
        return redirect('/dashboard/1');
    } else if (Auth::user() && Auth::user()->investor) {
        return redirect('/dashboard/2');
    } else {
        return redirect('/');
    }
})->name('home');
Route::get('/dashboard', function () {
    if (Auth::user() && Auth::user()->owner) {
        return redirect('/dashboard/1');
    } else if (Auth::user() && Auth::user()->investor) {
        return redirect('/dashboard/2');
    } else {
        return redirect('/');
    }
})->name('dashboard');

Route::middleware(['auth:web'])->get('/add/business', 'HomeController@index');;
Route::middleware(['auth:web', 'businessOwner'])->get('/dashboard/1/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessOwner'])->get('/dashboard/1', 'HomeController@index');

Route::middleware(['auth:web', 'businessInvestor'])->get('/dashboard/2/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessInvestor'])->get('/dashboard/2', 'HomeController@index');
Route::view('/{path?}', 'welcome');
Route::view('/business/{path?}', 'welcome');
Route::view('/search/{path?}', 'welcome');
