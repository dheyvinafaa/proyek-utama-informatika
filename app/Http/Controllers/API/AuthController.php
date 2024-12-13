<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{
	public function login(Request $request)
	{
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
				$payload = [
                    'user_id' => $data->id,
                ];

				$jwt = JWT::encode($payload, env('JWT_KEY'), 'HS256');

				return response()->json([
					'status' => 'success',
					'message' => 'Login success',
					'data' => [
						'token' => $jwt,
						'user' => $data
					]
				]);
			} else {
				return response()->json([
					'status' => 'fail',
					'message' => 'Password salah'
				]);
			}
		} else {
			return response()->json([
				'status' => 'fail',
				'message' => 'Email tidak terdaftar'
			]);
		}
	}

	public function register(Request $request)
	{
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

		return response()->json([
			'status' => 'success',
			'message' => 'Register success',
			'data' => $user
		]);
	}
}