{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Halaman Kategori</h4>

    @if (session()->has('success'))
        <!-- flashdata sweetalert -->
        <div class="flash-data" data-flashdata="{{ session('success') }}"></div>
    @endif
    
    {{-- pesan flash --}}
    {{-- @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif --}}

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="header">
                    <span class="title">Daftar Kategori</span>
                    <a href="/category/create" class="pull-right btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a>
                </div>
                <hr>
                <div class="content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>
                                        <a href="/category/{{ $category->id }}/edit" class="btn btn-xs btn-success">Edit</a>
                                        <form action="/category/{{ $category->id }}" method="post" class="mt-3 d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="return confirm('Apa Kamu Yakin.?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection