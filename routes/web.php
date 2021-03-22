<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/About', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('post')->group(function () {
    Route::get('/', [
        'as' => 'post.index',
        'uses' => 'PostController@index'
    ]);
    Route::get('/create', [
        'as' => 'post.create',
        'uses' => 'PostController@create'
    ]);
    Route::post('/store', [
        'as' => 'post.store',
        'uses' => 'PostController@store'
    ]);
    Route::get('/update/{id}', [
        'as' => 'post.update',
        'uses' => 'PostController@update'
    ]);
    Route::put('/edit/{id}', [
        'as' => 'post.edit',
        'uses' => 'PostController@edit'
    ]);
    Route::delete('/delete/{id}',[
        'as'=>'post.delete',
        'uses'=> 'PostController@delete'
    ]);
});
