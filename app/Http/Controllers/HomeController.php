<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Canteen;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index() {
        return view('index', [
            'categories' => Category::all(),
            'canteens' => Canteen::all(),
        ]);
    }

    public function kantin($slug) {
        $canteen = Canteen::where('slug', $slug)->first();
        $menus = $canteen->menus;

        return view('kantin', [
            'canteen' => $canteen,
            'menus' => $menus,
        ]);
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        $menus = Menu::where('category_id', $category->id)->get();

        return view('category', [
            'menus' => $menus,
        ]);
    }

    public function getAllMenu() {
        $menus = Menu::all();
        return view('menu', [
            'menus' => $menus,
        ]);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $menus = Menu::where('name', 'like', '%'.$keyword.'%')->get();
        return view('search', [
            'menus' => $menus,
        ]);
    }
}
