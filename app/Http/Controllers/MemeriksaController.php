<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
<<<<<<< HEAD
use App\Models\DaftarPoli;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
=======
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2

class MemeriksaController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $user = auth()->user();
        $dokter = $user->dokter;

        $periksas = Periksa::whereHas('daftarPoli.jadwal', function($query) use ($dokter) {
            $query->where('dokter_id', $dokter->id);
        })->with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter', 'detailPeriksa'])->get();

=======
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil data pemeriksaan dari database
        $periksas = Periksa::with('detailPeriksa', 'pasien')->where('dokter_id', $user->id)->get();

        // Tampilkan halaman pemeriksaan           
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
        return view('dokter.memeriksa', compact('periksas'));
    }

    public function create()
    {
        return view('dokter.memeriksa.create');
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        // Simpan data pemeriksaan ke database jika diperlukan di masa depan
=======
        // Simpan data pemeriksaan ke database
        // ...
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $periksa = Periksa::with(['detailPeriksa.obat', 'daftarPoli.pasien'])->findOrFail($id);
        $obats = Obat::select('id', 'nama_obat', 'harga')->get();
=======
        $periksa = Periksa::with('detailPeriksa.obat', 'pasien')->findOrFail($id);
        $obats = Obat::select('id', 'nama_obat', 'harga')->get(); // Pastikan kolom 'harga' diambil
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2

        return view('dokter.editperiksa', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    }
}