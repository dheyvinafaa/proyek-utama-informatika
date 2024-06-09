<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UserController extends Controller
{
	public function index() {
		$user = Users::all();

		return view('dashboard.user', [
			'title' => 'Pengguna',
			'subtitle' => 'Berikut adalah daftar pengguna yang terdaftar',
			'users' => $user,
			'roles' => ['penjual', 'pembeli'],
		]);
	}

	public function store(Request $request) {
		$request->validate([
			'username' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'role' => 'required',
		]);

		Users::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'role' => $request->role,
		]);

		return redirect()->route('dashboard.user')->with('success', 'Pengguna berhasil ditambahkan');
	}

	public function delete($id) {
		Users::destroy($id);

		return redirect()->route('dashboard.user')->with('success', 'Pengguna berhasil dihapus');
	}
}
