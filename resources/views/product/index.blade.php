{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')

    <h4>Halaman Produk</h4>

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="{{ session('success') }}"></div>

        {{-- pesan flash
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif --}}

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="header">
                    <span class="title">Daftar Produk</span>
                    <a href="/product/create" class="pull-right btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
                </div>
                <hr>
                <div class="content">

                    {{-- pencarian --}}
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <form action="/product" class="form-inline pull-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="pencarian" name="pencarian" placeholder="Pencarian" value="{{ request('pencarian') }}">
                                    <button type="submit" class="btn btn-info" >Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table id="produk" class="table table-striped">
                        <thead >
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Qty</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($produks->count())
    
                            @foreach ($produks as $produk)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->category->nama }}</td>
                                    <td>{{ $produk->qty }}</td>
                                    <td class="text-center">
                                        <a href="/product/{{ $produk->id }}" class="btn btn-secondary btn-xs" style="margin-top: 5px;">Detail</a>
                                        <a href="/product/{{ $produk->id }}/edit" class="btn btn-info btn-xs" style="margin-top: 5px;">Edit</a>
                                        <form action="/product/{{ $produk->id }}" method="post" class="mt-3 d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="return confirm('Apa Kamu Yakin.?')">Hapus</button>
                                        </form>

                                        {{-- <a href="/product/{{ $produk->id }}" class="btn btn-danger btn-xs">Hapus</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center text-danger"><strong>Produk tidak ditemukan</strong></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    Halaman : {{ $produks->currentPage() }} <br/>
                    Jumlah Data : {{ $produks->total() }} <br/>
                    Data Per Halaman : {{ $produks->perPage() }} <br/>

                    <div class="text-center">
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection

