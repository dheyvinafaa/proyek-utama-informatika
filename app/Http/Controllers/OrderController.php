<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\Users;

class OrderController extends Controller
{
  public function store(Request $request) {
		$cart = Cart::where('user_id', session('id'))->first();
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
		
		return redirect()->route('order.detail', $oderNumber);
	}

	public function detail($order_number) {
		$orders = Order::where('order_number', $order_number)->get();
		if(count($orders) == 0) {
			return abort(404);
		} 

		$user = Users::where('id', $orders[0]->user_id)->first();
		if($user->id != session('id')) {
			return abort(404);
		}

		return view('detail', [
			'orders' => $orders,
			'user' => $user,
			'total' => $orders->sum('total')
		]);
	}
}
