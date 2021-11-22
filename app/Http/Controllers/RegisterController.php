<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Halaman Register'
        ]);
    }

    public function store(Request $request)
    {
        // return $request;

        // ambil data yang di inputkan user
        // return $request->all();

        // validasi data inputan
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // encrypsi password
        // $validatedData['password'] = bcrypt($validatedData);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // pesan flash
        // $request->session()->flash('success', 'Reegistration successfull!, Please login.');

        return redirect('/login')->with('success', 'Registrasi berhasil, Silahkan login.');
    }
}
