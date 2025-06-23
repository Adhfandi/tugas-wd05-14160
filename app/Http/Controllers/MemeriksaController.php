<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
use App\Models\DaftarPoli;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemeriksaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $dokter = $user->dokter;

        $periksas = Periksa::whereHas('daftarPoli.jadwal', function($query) use ($dokter) {
            $query->where('dokter_id', $dokter->id);
        })->with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter', 'detailPeriksa'])->get();

        return view('dokter.memeriksa', compact('periksas'));
    }

    public function create()
    {
        return view('dokter.memeriksa.create');
    }

    public function store(Request $request)
    {
        // Simpan data pemeriksaan ke database jika diperlukan di masa depan
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periksa = Periksa::with(['detailPeriksa.obat', 'daftarPoli.pasien'])->findOrFail($id);
        $obats = Obat::select('id', 'nama_obat', 'harga')->get();

        return view('dokter.editperiksa', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'status' => 'required|in:Menunggu,Dalam Proses,Selesai,Batal'
        ]);

        DB::beginTransaction();
        try {
            $periksa = Periksa::findOrFail($id);

            // Update data pemeriksaan
            $periksa->update([
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'status' => $request->status
            ]);

            // Update status daftar poli
            $periksa->daftarPoli->update(['status' => $request->status]);

            // ✅ Hapus semua obat yang sebelumnya terkait dengan pemeriksaan ini
            $periksa->detailPeriksa()->delete();

            // ✅ Simpan obat-obat yang dipilih (jika ada)
            if ($request->has('obat_id')) {
                foreach ($request->obat_id as $obat_id) {
                    $periksa->detailPeriksa()->create([
                        'id_obat' => $obat_id
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('dokter.memeriksa')
                ->with('success', 'Status pemeriksaan dan obat berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatus($id)
    {
        DB::beginTransaction();
        try {
            $periksa = Periksa::findOrFail($id);
            $periksa->update(['status' => 'Selesai']);

            $periksa->daftarPoli->update(['status' => 'Selesai']);

            DB::commit();
            return redirect()->route('dokter.memeriksa')
                ->with('success', 'Status pemeriksaan berhasil diubah menjadi Selesai.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}