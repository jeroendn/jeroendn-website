<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Public views
Route::get('/', 'PublicController@index')->name('home');
Route::get('/home', 'PublicController@index')->name('home');
Route::get('/projects', 'PublicController@projects')->name('projects');
Route::get('/contact', 'PublicController@contact')->name('contact');
// Tools views
Route::get('/tools', 'ToolsController@index')->name('tools');
Route::get('/tools/youtube-downloader', 'ToolsController@youtubeDownloader')->name('youtube-downloader');
