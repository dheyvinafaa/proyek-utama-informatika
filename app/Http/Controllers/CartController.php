<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItems;
use App\Models\Users;
use App\Models\Cart;

class CartController extends Controller
{
	public function index()
	{
		$cartItems = CartItems::where('user_id', session('id'))->with('menu')->get();
		return response()->json([
			'success' => true,
			'message' => 'Cart Items',
			'data' => $cartItems
		]);
	}

	public function store(Request $request) {
		$user = Users::find(session('id'));
		$cart = Cart::where('user_id', $user->id)->first();
		$cartItems = CartItems::where('cart_id', $cart->id)->where('menu_id', $request->menu_id)->first();

		if($cartItems) {
			$cartItems->quantity += 1;
			$cartItems->save();
			return back()->with('success', 'Berhasil menambahkan menu ke keranjang');
		} else {
			CartItems::create([
				'cart_id' => $cart->id,
				'user_id' => session('id'),
				'menu_id' => $request->menu_id,
				'quantity' => 1,
				'note' => '',
			]);

			return back()->with('success', 'Berhasil menambahkan menu ke keranjang');
		}
	}

	public function delete($id) {
		$cartItems = CartItems::find($id);
		$cartItems->delete();

		return back()->with('success', 'Berhasil menghapus menu dari keranjang');
	}
}
