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

class TransactionController extends Controller
{
	public function store(Request $request) {
		$token = session('token');
		$user = Users::find(AuthController::getJWT($token)->user_id);

		$cart = Cart::where('user_id', $user->id)->first();
		$cartItems = CartItems::where('cart_id', $cart->id)->get();

		$oderNumber = 'ORD-' . mt_rand(10000, 99999);
		foreach($cartItems as $cartItem) {
			Order::create([
				'order_number' => $oderNumber,
				'user_id' => session('id'),
				'menu_id' => $cartItem->menu_id,
				'canteen_id' => $cartItem->menu->canteen->id,
				'quantity' => $cartItem->quantity,
				'total' => $cartItem->menu->price * $cartItem->quantity,
				'status' => 'unpaid',
				'note' => $request->note,
				'type' => $request->type,
			]);
		}

		// clear cart
		CartItems::where('cart_id', $cart->id)->delete();
		
		return response()->json([
			'success' => true,
			'message' => 'Pesanan berhasil dibuat'
		]);
	}
}