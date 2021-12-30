<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'title' => 'Pelanggan',
            'icon' => 'pe-7s-user',
            'pelanggan' => Pelanggan::latest()->get()
        ]);
    }

    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Tambah Pelanggan',
            'icon' => 'pe-7s-user'
        ]);
    }

    public function store(Request $request)
    {
        // validasi form
        $val =  $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);

        // insert datanya dengan cara berikut
        Pelanggan::create($val);

        // jika berhasil arahkan ke halaman pelanggan dan kirimkan juga pesan suksesnya
        return redirect('/pelanggan')->with('success', 'ditambahkan');
    }

    public function edit(Pelanggan $pelanggan)
    {
        // mencari data di dalam model produk yang methodnya find dan kirim data nya, berdasarkan slug
        return view('pelanggan.edit', [
            'title' => 'Edit Pelanggan',
            'icon' => 'pe-7s-box1',
            'pelanggan' => $pelanggan
        ]);
    }

    
}
