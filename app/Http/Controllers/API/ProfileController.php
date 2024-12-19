<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\Cart;
use App\Models\CartItems;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Canteen;
use App\Models\Order;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	public function update(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'email' => 'required|email',
			'password' => 'nullable',
		]);

		$token = session('token');
		$user = Users::find(AuthController::getJWT($token)->user_id);

		$user->update([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password ? bcrypt($request->password) : $user->password,
		]);

		return response()->json([
			'success' => true,
			'message' => 'Profile updated successfully',
		]);
	}
}