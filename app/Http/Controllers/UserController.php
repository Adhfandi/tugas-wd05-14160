<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'alamat'   => 'required|string',
            'no_hp'    => 'required|string',
            'email'    => 'required|email|unique:users',
            'role'     => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'nama'     => $validated['nama'],
            'alamat'   => $validated['alamat'],
            'no_hp'    => $validated['no_hp'],
            'email'    => $validated['email'],
            'role'     => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        // redirect atau response lainnya
        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }
}
