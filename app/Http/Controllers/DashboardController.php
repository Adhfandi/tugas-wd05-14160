<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('dashboard');
    }

    public function tables()
    {
        return view('tables');
    }

=======
        return view('dashboard.index');
    }
    public function dokter()
    {
        return view('dokter.dashboard');
    }
    public function dokterperiksa()
    {
        return view('dokter.periksa');
    }
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    public function pasien()
    {
        return view('pasien.dashboard');
    }
<<<<<<< HEAD
}
=======
    public function pasienperiksa()
    {
        return view('pasien.periksa');
    }
    public function pasienriwayat()
    {
        return view('pasien.riwayat');
    }
}

>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
