<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'title' => 'Kategori',
            'icon' => 'pe-7s-note2',
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah Kategori',
            'icon' => 'pe-7s-note2'
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
            'nama' => 'required|max:255'
        ]);

        // insert datanya dengan cara berikut
        Category::create($val);

        // jika berhasil arahkan ke halaman kategori dan kirimkan juga pesan suksesnya
        return redirect('/category')->with('success', 'ditambahkan');
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
    public function edit(Category $category)
    {
        // mencari data di dalam model produk yang methodnya find dan kirim data nya, berdasarkan slug
        return view('category.edit', [
            'title' => 'Detail Produk',
            'icon' => 'pe-7s-box1',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validasi form
        $val =  $request->validate([
            'nama' => 'required|max:255'
        ]);

        // insert datanya dengan cara berikut
        Category::where('id', $category->id)
            ->update($val);

        // jika berhasil arahkan ke halaman kategori dan kirimkan juga pesan suksesnya
        return redirect('/category')->with('success', 'diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // hapus datanya dengan cara berikut
        Category::destroy($category->id);

        // jika berhasil arahkan ke halaman posts dan kirimkan juga pesan suksesnya
        return redirect('/category')->with('success', 'dihapus');
    }
}
