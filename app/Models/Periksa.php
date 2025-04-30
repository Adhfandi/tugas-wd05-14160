<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Periksa extends Model
{
    protected $table = 'periksa';
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
}