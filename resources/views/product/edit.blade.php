{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Edit Produk</h4>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <span>Edit</span>
                </div>
                <div class="content">
                    <form method="post" action="/product/{{ $produk->id }}">
                        @method('put')
                        @csrf

                        <div class="form-group  @error('nama') has-error @enderror">
                            <label for="nama" class="control-label">Nama Produk</label>
                            <input type="text" class="form-control " name="nama" id="nama" value="{{ old('nama', $produk->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" id="category_id" class="form-control" required>

                                        <option value="">-- Pilih --</option>
                                        @foreach ($categories as $category)
                                            @if (old('category_id', $produk->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('qty') has-error @enderror">
                                    <label for="qty">QTY</label>
                                    <input type="number" min="0" name="qty" class="form-control" id="qty" value="{{ old('qty', $produk->qty) }}">
                                    @error('qty')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('harga_beli') has-error @enderror">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" min="0" name="harga_beli" class="form-control" id="harga_beli" value="{{ old('harga_beli', $produk->harga_beli) }}">
                                    @error('harga_beli')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('harga_jual') has-error @enderror">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" min="0" name="harga_jual" class="form-control" id="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}">
                                    @error('harga_jual')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection