<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->post('/novo-usuario', 'UserController@new');
Route::middleware('auth:api')->post('/update-usuario/{id}', 'UserController@update');
Route::middleware('auth:api')->delete('/deletar-usuario/{id}', 'UserController@destroy');

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->get('/usuarios', 'UserController@getUsers');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
