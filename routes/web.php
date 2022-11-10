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
Route::get('/', 'PublicController@index')->name('root');
Route::get('/home', 'PublicController@index')->name('home');
Route::get('/projects', 'PublicController@projects')->name('projects');
Route::get('/contact', 'PublicController@contact')->name('contact');
// Admin for public views
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/projects', 'AdminController@projects')->name('admin.projects');
Route::post('/admin/projects', 'AdminController@projects')->name('admin.projects');
// Tools views
Route::get('/tools', 'ToolsController@index')->name('tools');
Route::get('/tools/youtube-downloader', 'ToolsController@youtubeDownloader')->name('tools.youtube-downloader');
Route::get('/tools/instagram-downloader', 'ToolsController@instaDownloader')->name('tools.instagram-downloader');
Route::get('/tools/image-generator', 'ToolsController@imageGenerator')->name('tools.image-generator');
// Diary views
Route::get('/diary', 'DiaryController@index')->name('diary');
