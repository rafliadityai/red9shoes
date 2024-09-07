<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('orders');
        }
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function register()
    {
        return view('admin.register');
    }


    public function handleRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);
    
        // Enkripsi password sebelum menyimpannya
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password); // Enkripsi password
        $admin->save();
    
        return redirect('login')->with('status', 'Admin registered successfully!');
    }

    public function logout(Request $request)
{
    
    auth()->guard('admin')->logout();
    return redirect('/');
}

    
}
