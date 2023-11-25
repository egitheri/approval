<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function cekLogin(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            $request->flash('error', 'Wrong Email and password');
            return redirect('/');
        }

        return redirect('cuti');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
