<?php
// app/Http/Controllers/PendaftaranController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pelajar;
use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create(Request $request)
    {
        $harga = $request->query('harga', 300000);
        $id_kursus = $request->query('id_kursus');
        return view('pengguna.pendaftaran', compact('harga', 'id_kursus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'kode_bahasa' => 'required|in:English,Jepang,Mandarin,Korea,Spanyol,Jerman',
            'durasi' => 'required|integer|min:1',
            'harga' => 'required|numeric',
        ]);

        $user = Auth::user();

        // Buat atau ambil pelajar
        $pelajar = Pelajar::firstOrCreate(
            ['user_id' => $user->id],
            ['name' => $validated['nama']]
        );

        // Cari kursus berdasarkan kode_bahasa
        $kursus = Kursus::where('kode_bahasa', strtolower($validated['kode_bahasa']))->first();

        if (!$kursus) {
            return back()->with('error', 'Kursus untuk bahasa ini tidak ditemukan.');
        }

        // Simpan pendaftaran
        $pendaftaran = Pendaftaran::create([
            'id_pelajar' => $pelajar->id_pelajar,
            'id_kursus' => $kursus->id_kursus,
            'nama' => $request->nama,
            'kode_bahasa' => strtolower($validated['kode_bahasa']),
            'tanggal_daftar' => now(),
            'status' => 'pending',
        ]);
        

        session([
            'pendaftaran_id' => $pendaftaran->id_pendaftaran,
            'kode_bahasa' => $validated['kode_bahasa'],
            'durasi' => $validated['durasi'],
            'harga' => $validated['harga'],
        ]);

        return redirect()->route('pembayaran.create')->with('success', 'Pendaftaran berhasil.');
    }
}
