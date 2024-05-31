<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()  
    {
        return view('page.auth.login');    
    }

    public function profile()  
    {
        $user = Auth::user();
        $data = 'portal';
        return view('page.auth.profile', compact('user', 'data'));    
    }

    public function updateProfile(Request $request)  
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8|required_with:conpassword|same:conpassword',
        ]);

        DB::beginTransaction();
        try {
            if ($request->password != null) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil merubah profile');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal merubah profile');
        }
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
                return redirect()->intended('portal/dashboard');
            }
            else {
                return redirect()->back()->with('danger', 'Username / Password Salah !');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Terjadi Kesalahan');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
