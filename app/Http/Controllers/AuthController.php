<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // $users = Admin::on('mysql2')->where('username', $request->username)->first();

        if (Auth::attempt($request->only('username', 'password'))) 
        {
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['username' => 'Username atau password salah!']);
    }


    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:3',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}

