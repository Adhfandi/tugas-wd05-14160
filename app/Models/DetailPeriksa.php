<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    //
    protected $table = 'detail_periksa';
    protected $fillable = [
        'id_periksa',
        'id_obat'
<<<<<<< HEAD
    
=======

>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    ];
    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}
