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

Route::get('blog','App\Http\Controllers\BlogController@index')->name('blog');
Route::get('add-blog','App\Http\Controllers\BlogController@addBlog')->name('add-blog');
Route::get('blog-detail/{id}','App\Http\Controllers\BlogController@blogDetail')->name('blog-detail');
Route::post('add-blog-save','App\Http\Controllers\BlogController@StoreBlog')->name('add-blog-save');
Route::post('blog-post-comment','App\Http\Controllers\BlogController@BlogPostComment')->name('blog-post-comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
