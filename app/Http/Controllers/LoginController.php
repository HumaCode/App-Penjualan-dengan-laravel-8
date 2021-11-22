<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Halaman Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // validasi
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // jika ada percobaan login, maka akan di jalankan class berikkut untuk keamanan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // generate ulang session (token) supaya tidak ada token yang sama

            // jika berhasil, maka akan di arahkan ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        // jika login gagal, maka akan di arahkan kembali ke halaman login, dan kirimkan pesan 
        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); // hapus sesinya supaya tidak bisa dipakai

        $request->session()->regenerateToken(); // buat baru tokenya supaya tidak di bajak/hack

        return redirect('/login'); // arahkan ke halaman login
    }
}
