{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')

    <div class="col-lg-6">
        <div class="panel" >
            <!-- Default panel contents -->
            <div class="panel-heading" style="background-color: #805EC6; color: white;"><strong>Detail Produk</strong></div>
            
                <ul class="list-group">
                    <li class="list-group-item"> Nama Produk : 
                        <span class="pull-right">{{ $produk->nama }}</span>
                        
                    </li>
                    <li class="list-group-item">QTY : 
                        <span class="pull-right">{{ $produk->qty }}</span>
                    </li>
                    <li class="list-group-item">Kategori : 
                        <span class="pull-right">{{ $produk->category->nama }}</span>
                    </li>
                    <li class="list-group-item">Harga Beli : 
                        <span class="pull-right">{{ currency_IDR($produk->harga_beli) }}</span>
                    </li>
                    <li class="list-group-item">Harga Jual : 
                        <span class="pull-right">{{ currency_IDR($produk->harga_jual) }}</span>
                    </li>
                </ul>
            </div>
            <a href="/product" class="btn btn-danger pull-right">Kembali</a>
    </div>
@endsection