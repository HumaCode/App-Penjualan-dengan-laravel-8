{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Tambah Pelanggan</h4>
    
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="header">
                    <span>Tambah</span>
                </div>
                <div class="content">
                    <form method="post" action="/pelanggan">
                        @csrf

                        <div class="col-md-6">
                            <div class="form-group  @error('nama_pelanggan') has-error @enderror">
                                <label for="nama_pelanggan" class="control-label">Nama Pelanggan</label>
                                <input type="text" class="form-control " name="nama_pelanggan" id="nama_pelanggan" autofocus value="{{ old('nama_pelanggan') }}">
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group  @error('alamat') has-error @enderror">
                                <label for="alamat" class="control-label">Alamat</label>
                                <input type="text" class="form-control " name="alamat" id="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  @error('tlp') has-error @enderror">
                            <label for="tlp" class="control-label">No. Hp</label>
                            <input type="number" min="0" class="form-control " name="tlp" id="tlp" value="{{ old('tlp') }}">
                            @error('tlp')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection