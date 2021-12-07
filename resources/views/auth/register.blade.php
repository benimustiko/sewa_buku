@extends('layouts.app')

@section('content')
<div class="container" style="display: grid; place-items: center; min-height: 80vh">
    <div style="display: flex; align-items: center; width: 45vw; overflow: hidden; border-radius: 5px; max-height: 100vh;">
        <div class="p-md-5" style="min-width: 25vw;">
            <p class="text-dark text-center" style="font-size: 20px;">SIGN UP</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div <?= 'class="row'.($errors->any() ? '"' : ' mb-4"') ?>>
                    <input style="outline: 0;
                    border-width: 0 0 2px;
                    padding-left: 16px;
                    background-color: #f8fbff;" type="text" placeholder="Nama lengkap" id="name" name="name" value="{{ old('name') }}" autofocus>
                </div>


                @error('name')
                <div class="form-text text-danger mb-2">
                    Nama lengkap harus di isi
                </div>
                @enderror




                <div <?= 'class="row'.($errors->any() ? '"' : ' mb-4"') ?>>
                    <input style="outline: 0;
                    border-width: 0 0 2px;
                    padding-left: 16px;
                    background-color: #f8fbff;" type="text" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}">
                </div>

                @error('alamat')
                <div class="form-text text-danger mb-2">
                    Alamat harus di isi
                </div>
                @enderror




                <div <?= 'class="row'.($errors->any() ? '"' : ' mb-4"') ?>>
                    <input style="outline: 0;
                    border-width: 0 0 2px;
                    padding-left: 16px;
                    background-color: #f8fbff;" type="text" placeholder="No Hp" name="no_hp" value="{{ old('no_hp') }}">
                </div>

                @error('no_hp')
                <div class="form-text text-danger mb-2">
                    No Hp harus di isi
                </div>
                @enderror




                <div <?= 'class="row'.($errors->any() ? '"' : ' mb-4"') ?>>
                    <input style="outline: 0;
                    border-width: 0 0 2px;
                    padding-left: 16px;
                    background-color: #f8fbff;" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>

                @error('email')
                <div class="form-text text-danger mb-2">
                    Email harus di isi
                </div>
                @enderror




                <div <?= 'class="row'.($errors->any() ? '"' : ' mb-1"') ?>>
                    <input style="outline: 0;
                    border-width: 0 0 2px;
                    padding-left: 16px;
                    background-color: #f8fbff;" type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                </div>

                @error('password')
                <div class="form-text text-danger mb-2">
                    Password harus di isi
                </div>
                @enderror


                <div class="row mt-1">
                    <div class="col">
                        <span class="form-text text-dark">Kembali ke halaman </span>
                        <a class="text-decoration-none d-inline form-text text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-dark mt-3" type="submit">SIGN UP</button>
                </div>


            </form>
        </div>
        <div>
            <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1541690531121-5d844bfc1711?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
        </div>
    </div>
</div>
@endsection
