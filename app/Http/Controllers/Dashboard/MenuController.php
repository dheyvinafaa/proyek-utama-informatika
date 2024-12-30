<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Canteen;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
	public function index() {
		$canteen = Canteen::where('user_id', session('id'))->first();
		$category = Category::all();

		return view('dashboard.menu', [
			'title' => 'Menu',
			'subtitle' => 'Berikut adalah menu yang tersedia di kantin Anda',
			'menus' => Menu::where('canteen_id', $canteen->id)->get(),
			'categories' => $category
		]);
	}

	public function store(Request $request) {
		// dd($request->all());
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'category_id' => 'required|exists:category,id',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
		]);

		$canteen = Canteen::where('user_id', session('id'))->first();
		$image = $request->file('image');

		$imageName = time().'.'.$image->extension();
		$image->move(public_path('menuImages'), $imageName);

		Menu::create([
			'name' => $request->name,
			'slug' => Str::slug($request->name),
			'description' => $request->description,
			'price' => $request->price,
			'category_id' => $request->category_id,
			'canteen_id' => $canteen->id,
			'image' => asset('menuImages/'.$imageName),
		]);

		return redirect()->route('dashboard.menu')->with('success', 'Menu berhasil ditambahkan');
	}

	public function delete($id) {
		$menu = Menu::find($id);
		$image = $menu->image;

		$image = explode('menuImages/', $image)[0];
		$split_image = explode('/', $image)[4];

		// delete image
		$image_path = public_path($split_image);
		if(file_exists($image_path)) {
			unlink($image_path);
		}

		$menu->delete();

		return back()->with('success', 'Menu berhasil dihapus');
	}
}
