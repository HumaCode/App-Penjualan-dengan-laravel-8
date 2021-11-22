<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'title' => 'Produk',
            'icon' => 'pe-7s-box1',
            'produks' => Product::latest()->filter(request(['pencarian']))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'title' => 'Produk',
            'icon' => 'pe-7s-box1',
            'categories' => Category::all()
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
        // return $request;
        // validasi form
        $val =  $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);

        // insert datanya dengan cara berikut
        Product::create($val);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/product')->with('success', 'ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // mencari data di dalam model produk yang methodnya find dan kirim data nya, berdasarkan slug
        return view('product.detailProduk', [
            'title' => 'Detail Produk',
            'icon' => 'pe-7s-box1',
            'produk' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'title' => 'Edit Produk',
            'icon' => 'pe-7s-box1',
            'produk' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $val =  $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);

        // insert datanya dengan cara berikut
        Product::where('id', $product->id)
            ->update($val);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/product')->with('success', 'diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // hapus datanya dengan cara berikut
        Product::destroy($product->id);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/product')->with('success', 'dihapus');
    }
}
