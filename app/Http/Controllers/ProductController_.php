<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // menampilkan semua produk
    public function index()
    {
        return view('dashboard.produk.index', [
            'title' => 'Produk',
            'icon' => 'pe-7s-box1',
            'produks' => Produk::all()
        ]);
    }

    // menampilkan detail produk, dan menerima parameter slug.
    // menggunakan route model binding, dengan cara mengikatkan model dari produk
    public function show(Produk $produk)
    {
        // mencari data di dalam model produk yang methodnya find dan kirim data nya, berdasarkan slug
        return view('dashboard.produk.detailProduk', [
            'title' => 'Detail Produk',
            'icon' => 'pe-7s-box1',
            'produk' => $produk
        ]);
    }
}
