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

Route::middleware('guest.custom')->group(function(){
    Route::get('/', 'AuthenticationController@index');
    Route::post('/login', 'AuthenticationController@login');
    Route::get('/users/register', 'AuthenticationController@register')->name('register');
    Route::post('/users/register', 'AuthenticationController@storeUser');
});

Route::middleware(['auth.custom','admin'])
->prefix('admin')
->namespace('Admin')
->group(function(){
    Route::get('/','AdminsController@index')->name('admin.index');
});
Route::middleware(['auth.custom','user'])
->prefix('user')
->namespace('User')
->group(function(){
    Route::get('/','WalletsController@index')->name('user.index');
    Route::post('/categories','CategoriesController@store')->name('category.create');
    Route::post('/transactions','TransactionsController@store')->name('transactions.create');
});

Route::middleware('auth.custom')->group(function(){
    Route::get('/logout', 'AuthenticationController@logout')->name('logout');
});