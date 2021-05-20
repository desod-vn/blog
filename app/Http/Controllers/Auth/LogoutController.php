<?php

namespace App\Http\Controllers\Auth;

use App\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    // Đăng xuất
    public function index()
    {
        if (Auth::check())
        {
            Auth::user()->token()->revoke();

            return response()->json([
                'status' => Status::SUCCESS,
            ]);
        }
    }

}
