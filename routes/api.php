<?php

use Illuminate\Http\Request;

Route::post('/cadastro-usuario', function (){

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
