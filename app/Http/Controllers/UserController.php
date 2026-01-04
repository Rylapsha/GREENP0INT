<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Pengguna',
            'menuAdminUser' => 'active',
            'users'         => User::orderBy('hak_akses', 'ASC')->get(),
        );

        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data Pengguna',
            'menuAdminUser' => 'active',
        );

        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'hak_akses' => 'required'
        ], [
            'name.required' => 'Anda belum memasukkan nama!',
            'email.required' => 'Anda belum memasukkan email!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Anda belum membuat password!',
            'password.min' => 'Password belum memuat 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'hak_akses.required' => 'Anda belum memilih hak akses!'

        ]);

        $user = new User;
        $user->nama = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->hak_akses = $request->hak_akses;
        $user->total_point = 0;
        $user->save();

        return redirect()->route('user')->with('success', 'Data pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = array(
            'title'         => 'Edit Data Pengguna',
            'menuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        );

        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'. $id,
            'password' => 'nullable|min:8|confirmed',
            'hak_akses' => 'required'
        ], [
            'name.required' => 'Anda belum mengubah nama!',
            'email.required' => 'Anda belum memasukkan email!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.min' => 'Password belum memuat 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'hak_akses.required' => 'Anda belum memilih hak akses!'

        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->hak_akses = $request->hak_akses;
        $user->save();
        return back()->with('success', 'Data pengguna berhasil diubah!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data pengguna berhasil dihapus!');
    }
}

