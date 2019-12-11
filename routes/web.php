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

Route::view('/{path?}', 'welcome');

Auth::routes();
Route::get('/home', function(){
    if(Auth::user()->businessOwner) {
        return redirect('/businessOwner');
    }else if(Auth::user()->businessInvestor) {
        return redirect('/businessInvestor');
    }
    else {
        return redirect('/');
    }
})->name('home');

Route::middleware(['auth:web', 'businessOwner'])->get('/businessOwner/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessOwner'])->get('/businessOwner', 'HomeController@index');

Route::middleware(['auth:web', 'businessInvestor'])->get('/businessInvestor/{path?}', 'HomeController@index');
Route::middleware(['auth:web', 'businessInvestor'])->get('/businessInvestor', 'HomeController@index');
