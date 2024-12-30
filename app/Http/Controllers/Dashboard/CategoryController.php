<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
	public function index() {
		$category = Category::all();

		return view('dashboard.category', [
			'title' => 'Kategori',
			'subtitle' => 'Berikut adalah daftar kategori yang tersedia',
			'categories' => $category,
		]);
	}

	public function store(Request $request) {
		$request->validate([
			'name' => 'required|unique:category',
			'description' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$imageName = time().'.'.$request->image->extension();
		$request->image->move(public_path('categoryImages'), $imageName);

		Category::create([
			'name' => $request->name,
			'slug' => Str::slug($request->name), 
			'description' => $request->description,
			'image' => asset('categoryImages/'.$imageName),
		]);

		return redirect()->route('dashboard.category')->with('success', 'Kategori berhasil ditambahkan');
	}

	public function delete($id) {
		$category = Category::find($id);
		unlink(public_path('categoryImages/'.$category->image));

		$category->delete();

		return redirect()->route('dashboard.category')->with('success', 'Kategori berhasil dihapus');
	}
}
