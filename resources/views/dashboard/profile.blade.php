    {{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')

    <div class="col-lg-6">
        <div class="panel" >
            <!-- Default panel contents -->
            <div class="panel-heading" style="background-color: #805EC6; color: white;"><strong></strong></div>
            
                <ul class="list-group">
                    <li class="list-group-item"> Nama User : 
                        <span class="pull-right">{{ auth()->user()->nama }}</span>
                    </li>
                    <li class="list-group-item"> Username : 
                        <span class="pull-right">{{ auth()->user()->username }}</span>
                    </li>
                    <li class="list-group-item"> Email : 
                        <span class="pull-right">{{ auth()->user()->email }}</span>
                    </li>
                    <li class="list-group-item"> Status : 
                        @if (auth()->user()->is_admin == 1)
                            <span class="pull-right text-success">Admin</span>
                        @else
                            <span class="pull-right text-danger">Petugas</span>
                        @endif
                    </li>
                    <li class="list-group-item"> Mendaftar Pada : 
                        <span class="pull-right">{{ date('d F Y', strtotime(auth()->user()->created_at)) }}</span>
                    </li>
                </ul>
            </div>
            <a href="/dashboard" class="btn btn-danger pull-right">Kembali</a>
    </div>
@endsection