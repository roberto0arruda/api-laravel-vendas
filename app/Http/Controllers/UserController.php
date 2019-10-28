<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function new(UserFormRequest $request)
    {
        $user = new User();

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->cep          = $request->cep;
        $user->street       = $request->street;
        $user->number       = $request->number;
        $user->neighborhood = $request->neighborhood;
        $user->city         = $request->city;
        $user->state        = $request->state;

        $user->save();

        return $user;
    }

    public function login(LoginFormRequest $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $user = auth()->user();

            $user->token = $user->createToken($user->email)->accessToken;

            return $user;
        } else {
            return ['status' => false];
        }
    }
}
