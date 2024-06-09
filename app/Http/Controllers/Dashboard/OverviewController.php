<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Canteen;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Users;

class OverviewController extends Controller
{
	public function index() {
		if(session('role') == 'admin') {
			$canteen = Canteen::all();
			$menu = Menu::all();
			$order = Order::all();
			$user = Users::where('id', session('id'))->first();
		} else if(session('role') == 'penjual'){
			$canteen = Canteen::where('user_id', session('id'))->first();
			$menu = Menu::where('canteen_id', $canteen->id)->get();
			$order = Order::where('canteen_id', $canteen->id)->get();
			$user = Users::where('id', session('id'))->first();
		}

		return view('dashboard.index', [
			'title' => 'Overview',
			'subtitle' => '',
			'menus' => $menu->count(),
			'orders' => $order->count(),
			'income' => $order->sum('total'),
			'user' => $user,
		]);
	}

}
