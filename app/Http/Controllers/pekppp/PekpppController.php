<?php

namespace App\Http\Controllers\pekppp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekpppController extends Controller
{
    public function login() 
    {
        return view('ekppp.auth.login');
    }

    public function postLogin(Request $request) 
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        try {
            Auth::attempt($credential);
            if (Auth::user()) {
                return redirect()->intended('pekppp/dashboard-pekppp');
            }
            else {
                return redirect()->back()->with('danger', 'Username / Password Salah !');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Terjadi Kesalahan');
        }
    }

    public function dashboard()  
    {
        return view('ekppp.page.dashboard');
    }

    public function profile()  
    {
        $user = Auth::user();
        return view('ekppp.auth.profiles', compact('user'));    
    }
}
