{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Tambah Produk</h4>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <span>Tambah</span>
                </div>
                <div class="content">
                    <form method="post" action="/product">
                        @csrf

                        <div class="form-group  @error('nama') has-error @enderror">
                            <label for="nama" class="control-label">Nama Produk</label>
                            <input type="text" class="form-control " name="nama" id="nama" autofocus value="{{ old('nama') }}">
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
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('qty') has-error @enderror">
                                    <label for="qty">QTY</label>
                                    <input type="number" min="0" name="qty" class="form-control" id="qty" value="{{ old('qty') }}">
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
                                    <input type="number" min="0" name="harga_beli" class="form-control" id="harga_beli" value="{{ old('harga_beli') }}">
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
                                    <input type="number" min="0" name="harga_jual" class="form-control" id="harga_jual" value="{{ old('harga_jual') }}">
                                    @error('harga_jual')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection