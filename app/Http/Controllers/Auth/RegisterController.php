<?php

namespace App\Http\Controllers\Auth;

use App\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    // Đăng ký tài khoản
    public function index(RegisterRequest $request)
    {
        $user = new User;

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->slug = Str::slug($request->name, '-');

        if($request->gender == 'Nam')
            $user->avatar = Status::APP . 'default/male.png';
        else
            $user->avatar = Status::APP . 'default/female.png';

        $user->save();

        $user->token = $user->createToken('App')->accessToken;

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Authenticated.',
            'token' => $user->token,
        ]);
    }

}
