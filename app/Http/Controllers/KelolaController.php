<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class KelolaController extends Controller
{
    public function index()
    {
        $user = (Auth::user());

        if ($user->hak_akses == 'Admin') {

            $data = array(
                'title'             => 'Kelola Sampah',
                'menuAdminKelola'   => 'active',
                'kelola'            => Kelola::with('user')->get(),
            );
            return view('admin/kelola/index', $data);
        } else {
            $data = array(
                'title'              => 'Setor Sampah',
                'menuPenggunaKelola' => 'active',
                'kelola'             => Kelola::with('user')
                    ->where('user_id', $user->id)
                    ->get(),
            );

            return view('pengguna/kelola/index', $data);
        }
            
        
    } 
    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data Penyetor',
            'menuAdminKelola' => 'active',
            'users' => User::where('hak_akses', 'User')->get(),
        );

        return view('admin/kelola/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'alamat'        => 'required',
            'jenis_sampah'  => 'required|in:Organik,Anorganik,B3',
            'berat_sampah'  => 'required|integer|min:1',
        ], [
            'user_id.required'      => 'Pengguna belum dipilih!',
            'user_id.exists'        => 'Pengguna tidak valid!',
            'alamat.required'       => 'Alamat belum diisi!',
            'jenis_sampah.required' => 'Jenis sampah belum dipilih!',
            'berat_sampah.required' => 'Berat sampah belum diisi!',
            'berat_sampah.integer'  => 'Berat sampah harus berupa angka!',
        ]);

        $kelola = new Kelola;
        $kelola->user_id = $request->user_id;
        $kelola->alamat = $request->alamat;
        $kelola->jenis_sampah = $request->jenis_sampah;
        $kelola->berat_sampah = $request->berat_sampah;
        $kelola->status = 'belum diverifikasi';
        $kelola->tanggal_verifikasi = null;
        $kelola->point = 0;
        $kelola->save();

        return redirect()->route('kelola')->with('success', 'Data sampah berhasil ditambahkan!');
    }

    public function setor(Request $request)
    {
        $request->validate([
            'alamat'        => 'required',
            'jenis_sampah'  => 'required|in:Organik,Anorganik,B3',
            'berat_sampah'  => 'required|integer|min:1',
        ],[
            
            'user_id.required'      => 'Pengguna belum dipilih!',
            'user_id.exists'        => 'Pengguna tidak valid!',
            'alamat.required'       => 'Alamat belum diisi!',
            'jenis_sampah.required' => 'Jenis sampah belum dipilih!',
            'berat_sampah.required' => 'Berat sampah belum diisi!',
            'berat_sampah.integer'  => 'Berat sampah harus berupa angka!',
        ]);

        Kelola::create([
            'user_id' => Auth::id(),
            'alamat'  => $request->alamat,
            'jenis_sampah' => $request->jenis_sampah,
            'berat_sampah' => $request->berat_sampah,
            'status' => 'belum diverifikasi',
            'point' => 0,
        ],);

        return back()->with('success', 'Sampah berhasil disetor, menunggu verifikasi admin.');
    }
    public function verifikasi($id)
    {
        $sampah = Kelola::findOrFail($id);
        if ($sampah->status == 'terverifikasi') {
            return back();
        }
        $point = $sampah->berat_sampah * 2;
        $sampah->update([
            'status' => 'terverifikasi',
            'tanggal_verifikasi' => now(),
            'point' => $point
        ]);
        $sampah->user->increment('total_point', $point);
        return back()->with('success', 'Berhasil diverifikasi');;
    }
    public function batalVerifikasi($id)
    {
        $sampah = Kelola::findOrFail($id);
        if ($sampah->status == 'belum diverifikasi') {
            return back();
        }
        $sampah->user->decrement('total_point', $sampah->point);
        $sampah->update([
            'status' => 'belum diverifikasi',
            'tanggal_verifikasi' => null,
            'point' => 0
        ]);
        return back()->with('error', 'Batal diverifikasi');
    }

    
}
