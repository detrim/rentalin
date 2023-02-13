<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
         'username' => 'required',
         'password' => 'required'
         ]);
        $data = [
           'username' => $request->input('username'),
           'password' => $request->input('password'),
        ];
        $master = User::where('username', $request->username)->first();
        if (!$master || !\Hash::check($request->password, $master->password)) {
            return back()->with('error', 'Login Failed!');
        }
        $request->session()->regenerate();
        return redirect()->intended('/dashboard-master');
    }
}