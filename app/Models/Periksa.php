<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periksa extends Model
{
    protected $table = 'periksa';
    
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
}