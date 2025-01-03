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
use App\Models\Category;
use App\Models\Canteen;
use App\Models\Order;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class MainController extends Controller
{
	public function category()
	{
		$category = Category::all();

		return response()->json([
			'status' => 'success',
			'data' => $category
		]);
	}

	public function canteen()
	{
		$canteen = Canteen::all();

		return response()->json([
			'status' => 'success',
			'data' => $canteen
		]);
	}

	public function detailCanteen($id)
	{
		$canteen = Canteen::with('menus')->find($id);

		return response()->json([
			'status' => 'success',
			'data' => $canteen
		]);
	}

	public function history() 
	{
		$token = session('token');
  	$order = Order::with('menu')->where('user_id', AuthController::getJWT($token)->user_id)->get();

		return response()->json([
			'success' => true,
			'message' => 'Order History',
			'data' => $order
		]);
	}

	public function profile()
	{
		$token = session('token');
		$user = Users::find(AuthController::getJWT($token)->user_id);

		return response()->json([
			'success' => true,
			'message' => 'Profile',
			'data' => $user
		]);
	}

	public function getMenuByCategory($id)
	{
		$menu = Menu::where('category_id', $id)->get();

		return response()->json([
			'success' => true,
			'message' => 'Menu by Category',
			'data' => $menu
		]);
	}

	public function search(Request $request)
	{
		$menu = Menu::where('name', 'like', '%' . $request->name . '%')->get();

		return response()->json([
			'success' => true,
			'message' => 'Search Menu',
			'data' => $menu
		]);
	}
}