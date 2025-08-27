<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        // If user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('index');
    }
    
    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Try to authenticate with username
        $user = User::where('name', $request->username)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }
        
        // If authentication fails, redirect back with error
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
