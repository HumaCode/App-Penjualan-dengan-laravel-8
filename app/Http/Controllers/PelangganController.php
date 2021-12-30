<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index', [
            'title' => 'Pelanggan',
            'icon' => 'pe-7s-user',
            'pelanggan' => Pelanggan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Tambah Pelanggan',
            'icon' => 'pe-7s-user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'title' => 'Edit Pelanggan',
            'icon' => 'pe-7s-user',
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $val =  $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);

        // insert datanya dengan cara berikut
        Pelanggan::where('id', $pelanggan->id)
            ->update($val);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/pelanggan')->with('success', 'diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        // hapus datanya dengan cara berikut
        Pelanggan::destroy($pelanggan->id);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/pelanggan')->with('success', 'dihapus');
    }
}
