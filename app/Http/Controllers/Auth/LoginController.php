<?php

namespace App\Http\Controllers\Auth;

use App\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    // Đăng nhập tài khoản
    public function index(LoginRequest $request)
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $user = User::where('name', $request->name)->first();

            $user->token = $user->createToken('App')->accessToken;

            return response()->json([
                'status' => Status::SUCCESS,
                'token' => $user->token,
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

}
