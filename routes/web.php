<?php

use App\Models\post;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','home@index')->name('home');
Route::get('/post/{slug}','home@showDetail')->name('show.post');
Route::get('/create/post','home@create')->name('create.post');
Route::post('/add/post','home@store')->name('store.post');
Route::get('/edit/post/{slug}', 'home@edit')->name('edit.post');
Route::put('/update/post/{slug}','home@update')->name('update.post');
