{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Halaman Pelanggan</h4>

    @if (session()->has('success'))
        <!-- flashdata sweetalert -->
        <div class="flash-data" data-flashdata="{{ session('success') }}"></div>
    @endif

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="header">
                    <span class="title">Daftar Pelanggan</span>
                    <a href="/pelanggan/create" class="pull-right btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
                </div>
                <hr>
                <div class="content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pelanggan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama_pelanggan }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>{{ $p->tlp }}</td>
                                    <td>
                                        <a href="/pelanggan/{{ $p->id }}/edit" class="btn btn-xs btn-success">Edit</a>
                                        <form action="/pelanggan/{{ $p->id }}" method="post" class="mt-3 d-inline">
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