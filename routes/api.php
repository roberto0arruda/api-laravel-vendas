<?php

use Illuminate\Http\Request;

Route::post('/cadastro-usuario', 'UserController@novo');

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
