<?php

namespace App\Http\Controllers\Auth;

use App\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
                'message' => 'Authenticated.',
                'user' => $user,
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Unauthenticated.',
        ]);
    }

    public function login()
    {
        $user = Auth::user();
        
        return response()->json([
            'status' => Status::SUCCESS,
            'user' => $user,
        ]);
    }
}
