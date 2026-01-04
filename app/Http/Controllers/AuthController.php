<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Anda belum memasukkan nama!',
            'email.required' => 'Anda belum memasukkan email!',
            'password.required' => 'Anda belum membuat password!',
            'password.min' => 'Password belum memuat 8 karakter!'
        ]);

        $user = User::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hak_akses' => 'User',
            'total_point' => 0,
        ]);

        Auth::login($user);
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil!, silakan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Mohon masukkan email!',
            'password.required' => 'Mohon masukkan password!'
        ]);

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Anda berhasil login!');
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }
}
