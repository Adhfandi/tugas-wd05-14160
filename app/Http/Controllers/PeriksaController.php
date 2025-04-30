<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;


class PeriksaController extends Controller
{
    public function index()
    {
        // Ambil data pemeriksaan dari database
        $periksas = Periksa::with('detailPeriksa.obat', 'dokter')->get();

        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa')->with('periksas', $periksas)->with('dokters', $dokters);
    }

    public function create()
    {
        return view('pasien.periksa.create');
    }

    public function store(Request $request)
    {
        // Ambil user yang sedang login
        $user = auth()->user();


        // Validasi data yang diterima
        $request->validate([
            'dokter_id' => 'required|exists:users,id'
        ]);

        // Simpan data pemeriksaan ke database
        Periksa::create([
            'pasien_id' => $user->id,
            'dokter_id' => $request->input('dokter_id'),
            'status' => 'Menunggu',
        ]);

        // Redirect ke halaman pemeriksaan
        return redirect()->route('pasien.periksa')->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data pemeriksaan berdasarkan ID
        // ...
        return view('pasien.periksa.edit', compact('periksa'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data pemeriksaan
        // ...
        return redirect()->route('pasien.periksa')->with('success', 'Pemeriksaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data pemeriksaan
        // ...
        return redirect()->route('pasien.periksa')->with('success', 'Pemeriksaan berhasil dihapus.');
    }
}
