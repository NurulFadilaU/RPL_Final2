<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username_or_email', 'pass');

        // Melakukan validasi input
        $request->validate([
            'username_or_email' => 'required|string|max:50',
            'pass' => 'required|string|max:20',
        ]);

        // Memperoleh user berdasarkan username atau email
        $user = User::where('username', $credentials['username_or_email'])
            ->orWhere('email', $credentials['username_or_email'])
            ->first();

        if ($user && Hash::check($credentials['pass'], $user->password)) {
            Auth::login($user);
            Log::info('User logged in: ', ['user_id' => $user->id]); // Menambahkan log untuk debugging

            switch ($user->id_jabatan) {
                case 1:
                    return redirect('/pimpinan/dashboard');
                case 2:
                    return redirect('/pj/dashboard');
                case 3:
                    return redirect('/anggota/dashboard');
                default:
                    return redirect('/login')->withErrors(['id_jabatan' => 'Akses tidak diizinkan']);
            }
        }


        // Jika login gagal
        return redirect('/login')->withErrors(['login' => 'Login gagal. Silakan periksa username atau email dan password Anda']);
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        session()->flush(); // Hapus semua sesi
        return redirect('/login'); // Redirect kembali ke halaman login
    }
}
