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

class CartController extends Controller
{
	public function index()
	{
		$token = session('token');
		$cartItems = CartItems::where('user_id', AuthController::getJWT($token)->user_id)->with('menu')->get();
		return response()->json([
			'success' => true,
			'message' => 'Cart Items',
			'data' => $cartItems
		]);
	}
	
	public function store(Request $request) {
		$token = session('token');
		$user = Users::find(AuthController::getJWT($token)->user_id);
		$cart = Cart::where('user_id', $user->id)->first();
		$cartItems = CartItems::where('cart_id', $cart->id)->where('menu_id', $request->menu_id)->first();

		if($cartItems) {
			$cartItems->quantity += 1;
			$cartItems->save();
			return response()->json([
				'success' => true,
				'message' => 'Berhasil menambahkan menu ke keranjang'
			]);
		} else {
			CartItems::create([
				'cart_id' => $cart->id,
				'user_id' => $user->id,
				'menu_id' => $request->menu_id,
				'quantity' => 1,
				'note' => '',
			]);

			return response()->json([
				'success' => true,
				'message' => 'Berhasil menambahkan menu ke keranjang'
			]);
		}
	}

	public function delete($id) {
		$cartItems = CartItems::find($id);
		$cartItems->delete();

		return back()->with('success', 'Berhasil menghapus menu dari keranjang');
	}
}