<?php

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->post('/novo-usuario', 'UserController@new');
Route::middleware('auth:api')->post('/update-usuario/{id}', 'UserController@update');
Route::middleware('auth:api')->delete('/deletar-usuario/{id}', 'UserController@destroy');

Route::middleware('auth:api')->post('/novo-produto', 'ProductController@new');
Route::middleware('auth:api')->post('/update-produto/{id}', 'ProductController@update');
Route::middleware('auth:api')->delete('/deletar-produto/{id}', 'ProductController@destroy');

Route::middleware('auth:api')->get('/usuarios', 'UserController@getUsers');
Route::middleware('auth:api')->get('/produtos', 'ProductController@getProducts');
