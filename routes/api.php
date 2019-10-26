<?php

use Illuminate\Http\Request;

Route::post('/cadastrar', 'UserController@new');

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
