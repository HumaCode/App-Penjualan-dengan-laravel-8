{{-- panggil layoutnya --}}
@extends('layouts.login')

@section('container')

    {{-- pesan flash --}}
    @if (session()->has('success'))
        <!-- flashdata sweetalert -->
        <div class="flash-data" data-flashdata="{{ session('success') }}"></div>
    @endif

    {{-- pesan flash --}}
    @if (session()->has('loginError'))
        <!-- flashdata sweetalert -->
        <div id="flash-data" data-flashdata="{{ session('loginError') }}"></div>
    @endif

    <div class="row">
        <div class="col-md-4 m-auto mt-5">
            <div class="card" >
                <div class="card-body">
                    <h2 class="text-center mb-5">Halaman Login</h2>

                    <form action="/login" method="post">

                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email.." value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.." >
                            @error('password')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="input-group d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>
                    <small>Belum punya akun.?<a href="/register">daftar.!</a></small>
                </div>
            </div>
        </div>
    </div>

@endsection