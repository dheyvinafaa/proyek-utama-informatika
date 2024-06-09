<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\Cart;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function loginPost(Request $request) {
        $messages = [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password wajib diisi',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        $data = Users::where('email', $request->email)->first();
        if($data) {
            if(Hash::check($request->password, $data->password)) {
                $request->session()->put('id', $data->id);
                $request->session()->put('username', $data->username);
                $request->session()->put('email', $data->email);
                $request->session()->put('role', $data->role);
                $request->session()->put('initial', $data->username[0]);
                return redirect()->route('index');
            } else {
                return back()->with('fail', 'Password salah');
            }
        } else {
            return back()->with('fail', 'Email tidak terdaftar');
        }
    }

    public function registerPost(Request $request) {
        $messages = [
            'username.required' => 'Username wajib di',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password_confirm.required' => 'Konfirmasi password wajib diisi',
            'password_confirm.same' => 'Konfirmasi password tidak sama dengan password',
        ];

        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ], $messages);


        $user = Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Cart::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
    }

    public function logout() {
        session()->flush();
        return redirect()->route('login');
    }
}
