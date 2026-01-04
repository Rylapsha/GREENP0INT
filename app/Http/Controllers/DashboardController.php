<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;

        if ($user->hak_akses == 'Admin') {
            $data = [
                'title'                => 'Dashboard Admin',
                'menuDashboard'        => 'active',
                'totalUser'            => User::count(),
                'totalAdmin'           => User::where('hak_akses', 'Admin')->count(),
                'totalSetor'           => Kelola::count(),
                'totalPoint'           => Kelola::where('status', 'terverifikasi')->sum('point'),
                'totalBelumVerifikasi' => Kelola::where('status', 'belum diverifikasi')->count(),
                'totalTerverifikasi'   => Kelola::where('status', 'terverifikasi')->count(),
            ];
        } else {

            $berhasil                   = Kelola::where('user_id', Auth::id())
                ->where('status', 'terverifikasi')
                ->count();
            $belum                      = Kelola::where('user_id', $user->id)
                ->where('status', 'belum diverifikasi')
                ->count();
            $data = [
                'title'                 => 'Dashboard User',
                'menuDashboard'         => 'active',
                'totalPoint'            => Kelola::where('user_id', $userId)
                    ->where('status', 'terverifikasi')
                    ->sum('point'),
                'totalSetoran'          => Kelola::where('user_id', $userId)->count(),
                'statusSetoran'         => $belum > 0
                    ? "$belum setoran belum diverifikasi"
                    : "Semua setoran sudah diverifikasi",
                'totalSetoranBerhasil'  => "$berhasil setoran sudah diverifikasi" ,
            ];
        }
        return view('dashboard', $data);
    }

    public function dashboardUser()
    {
        $user = Auth::user();
    }

    public function profile()
    {
        return view('profile', [
            'title' => 'Pengaturan Profil',
            'user'  => Auth::user(),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
