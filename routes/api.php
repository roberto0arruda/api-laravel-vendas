<?php

use Illuminate\Http\Request;

Route::post('/cadastro-usuario', 'UserController@cadastrar');

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
