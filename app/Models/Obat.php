<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
<<<<<<< HEAD
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga',
    ];
=======
    protected $table = "obat";

    protected $fillable = [
        "nama_obat",
        "kemasan",
        "harga",
    ];
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat', 'id');
    }
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
}
