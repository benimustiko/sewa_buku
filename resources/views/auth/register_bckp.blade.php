@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <label for="name" class="form-label">Nama lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}" autofocus>
                            </div>
                            @error('name')
                                <div class=" form-text text-danger">
                                    Nama lengkap harus di isi
                                </div>
                            @enderror
                            <div class="mt-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    name="alamat" value="{{ old('alamat') }}">
                            </div>
                            @error('alamat')
                                <div class=" form-text text-danger">
                                    Alamat harus di isi
                                </div>
                            @enderror
                            <div class="mt-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    name="no_hp" value="{{ old('no_hp') }}">
                            </div>
                            @error('no_hp')
                                <div class=" form-text text-danger">
                                    No Hp harus di isi
                                </div>
                            @enderror
                            <div class="mt-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class=" form-text text-danger">
                                    Email harus di isi
                                </div>
                            @enderror

                            <div class="mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                            </div>
                            @error('password')
                                <div class="form-text text-danger">
                                    Password harus di isi
                                </div>
                            @enderror
                            Kembali ke halaman <a href="/login" class="text-decoration-none">login</a>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
