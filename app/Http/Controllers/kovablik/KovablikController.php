<?php

namespace App\Http\Controllers\kovablik;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KovablikController extends Controller
{
    public function login() 
    {
        return view('kovablik.auth.login');
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
                return redirect()->intended('rumah-inovasi/dashboard-rumah-inovasi');
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
        return view('kovablik.page.dashboard');
    }

    public function profile()  
    {
        $user = Auth::user();
        return view('kovablik.auth.profiles', compact('user'));    
    }

}
