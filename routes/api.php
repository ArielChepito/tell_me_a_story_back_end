<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('stories', 'storyAPIController');

Route::resource('categories', 'categoryAPIController');

Route::resource('sections', 'sectionAPIController');

Route::resource('usuarios', 'usuarioAPIController');

Route::resource('usuario_stories', 'usuario_storyAPIController');