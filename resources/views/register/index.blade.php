{{-- panggil layoutnya --}}
@extends('layouts.login')

@section('container')

    <div class="row">
        <div class="col-md-4 m-auto mt-5">
            <div class="card" >
                <div class="card-body">
                    <h2 class="text-center mb-5">Halaman Register</h2>

                    <form action="/register" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama.." value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username.." value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

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
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                    <small>Sudah punya akun.?<a href="/login">login.!</a></small>
                </div>
            </div>
        </div>
    </div>

@endsection