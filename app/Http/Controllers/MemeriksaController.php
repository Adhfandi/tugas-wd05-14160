<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;

class MemeriksaController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil data pemeriksaan dari database
        $periksas = Periksa::with('detailPeriksa', 'pasien')->where('dokter_id', $user->id)->get();

        // Tampilkan halaman pemeriksaan           
        return view('dokter.memeriksa', compact('periksas'));
    }

    public function create()
    {
        return view('dokter.memeriksa.create');
    }

    public function store(Request $request)
    {
        // Simpan data pemeriksaan ke database
        // ...
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periksa = Periksa::with('detailPeriksa.obat', 'pasien')->findOrFail($id);
        $obats = Obat::select('id', 'nama_obat', 'harga')->get(); // Pastikan kolom 'harga' diambil

        return view('dokter.editperiksa', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'obat_id' => 'required|array', // Validasi bahwa obat_id adalah array
            'obat_id.*' => 'exists:obat,id', // Validasi bahwa setiap ID obat ada di tabel obat
            'status' => 'required|in:dalam proses,selesai,menunggu', // Validasi status sesuai dengan tampilan pasien
        ]);

        // Ambil data pemeriksaan berdasarkan ID
        $periksa = Periksa::findOrFail($id);

        // Hitung biaya periksa (harga semua obat + 150000)
        $hargaObat = Obat::whereIn('id', $request->obat_id)->sum('harga');
        $biayaPeriksa = $hargaObat + 150000;

        // Update tabel periksa
        $periksa->update([
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $biayaPeriksa,
            'status' => $request->status, // Gunakan status dari form
        ]);

        // Hapus data lama di detail_periksa
        $periksa->detailPeriksa()->delete();

        // Tambahkan data baru ke detail_periksa
        foreach ($request->obat_id as $id_obat) {
            $periksa->detailPeriksa()->create([
                'id_obat' => $id_obat,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan berhasil diperbarui.');
    }

    /**
     * Perbarui status pemeriksaan menjadi Selesai
     */
    public function updateStatus($id)
    {
        $periksa = Periksa::findOrFail($id);
        $periksa->update(['status' => 'selesai']);

        return redirect()->route('dokter.memeriksa')->with('success', 'Status pemeriksaan berhasil diubah menjadi Selesai.');
    }
}