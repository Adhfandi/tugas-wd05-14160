<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2

class Periksa extends Model
{
    protected $table = 'periksa';
<<<<<<< HEAD
    
    protected $fillable = [
        'daftar_poli_id',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
        'status'
    ];

    protected $attributes = [
        'status' => 'Menunggu'
    ];

    /**
     * Relasi ke daftar poli
     */
    public function daftarPoli(): BelongsTo
    {
        return $this->belongsTo(DaftarPoli::class, 'daftar_poli_id');
    }

    /**
     * Relasi ke detail periksa (obat-obat yang diberikan)
     */
    public function detailPeriksa(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }

    /**
     * Accessor: Ambil data pasien dari relasi daftar poli
     */
    public function getPasienAttribute()
    {
        return $this->daftarPoli?->pasien;
    }

    /**
     * Accessor: Ambil data dokter dari relasi jadwal
     */
    public function getDokterAttribute()
    {
        return $this->daftarPoli?->jadwal?->dokter;
    }
=======
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
        'status' // Menambahkan kolom status ke fillable
    ];

    // Memberikan nilai default untuk status
    protected $attributes = [
        'status' => 'menunggu'
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
}