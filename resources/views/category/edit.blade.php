{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Edit Kategori</h4>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <span>Edit</span>
                </div>
                <div class="content">
                    <form method="post" action="/category/{{ $category->id }}">
                        @method('put')
                        @csrf

                        <div class="form-group  @error('nama') has-error @enderror">
                            <label for="nama" class="control-label">Nama Kategori</label>
                            <input type="text" class="form-control " name="nama" id="nama" value="{{ old('nama', $category->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection