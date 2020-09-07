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
|Route::get('/', function () {
    return view('welcome');
});
*/


Route::resource('/', 'AuthController');

//Route::get('/admin','AuthController@dashboard')->name('admin');
//Route::get('admin.login','AuthController@showLoginForm')->name('admin.login');
//Route::get('admin.logout','AuthController@logout')->name('admin.logout');
//Route::post('admin.login.do', 'AuthController@login')->name('admin.login.do');
//Route::get('admin.registro','AuthController@registro')->name('admin.registro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit', 'HomeController@editar')->name('edit');
Route::post('/edit/home', 'HomeController@atualiza')->name('home');
Route::get('/usuario/{id}', "PostController@show");
Route::post('home/postagem','PostController@store');
Route::get('/home/config', 'HomeController@config');
Route::get('/edit-post/{id}','PostController@editarPost');
Route::post('/home','LikeController@like');
Route::post('/comenta','ComentariosController@comenta');
Route::get('/visualizar/{id}', 'PostController@visualiza');
Route::post('/deletePost/{post_id}', 'PostController@destroy');
Route::get('/usuarios', 'HomeController@users');
Route::get('/visualizaF/{id}', 'HomeController@visualizarFeed')->name('visualizar');
Route::post('/deslike', 'LikeController@deslike')->name('deslike');
Route::get('/perfil/{id}', 'HomeController@userVisu')->name('perfil');
