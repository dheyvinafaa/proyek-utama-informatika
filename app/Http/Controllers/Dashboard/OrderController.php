<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Canteen;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
	public function index() {
		$canteen = Canteen::where('user_id', session('id'))->first();
		$order = Order::where('canteen_id', $canteen->id)->get();

		return view('dashboard.order', [
			'title' => 'Pesanan',
			'subtitle' => 'Berikut adalah pesanan yang masuk ke kantin Anda',
			'orders' => $order
		]);
	}

	public function update($order_number) {
		$order = Order::where('order_number', $order_number)->get();
		
		foreach($order as $item) {
			$item->received_at  = Date::now();
			$item->save();
		}

		return redirect()->route('dashboard.order')->with('success', 'Pesanan berhasil diselesaikan');
	}
}
