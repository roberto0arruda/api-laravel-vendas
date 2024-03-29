<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use App\User;
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
    }

    public function update(UserUpdateFormRequest $request, $id)
    {
        $user = User::find($id);

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->cep          = $request->cep;
        $user->street       = $request->street;
        $user->number       = $request->number;
        $user->neighborhood = $request->neighborhood;
        $user->city         = $request->city;
        $user->state        = $request->state;

        if ($request->password) {
            $user->password     = bcrypt($request->password);
        }


        $user->save();
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

    public function getUsers()
    {
        return User::orderByDesc('id')->paginate(10);
    }

    public function destroy ($id)
    {
        User::find($id)->delete();
    }
}
