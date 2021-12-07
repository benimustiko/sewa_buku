@extends('layouts.app')

@section('content')
<div class="container" style="display: grid; place-items: center; min-height: 80vh">
    <div class="bg-primary" style="display: flex; align-items: center; justify-content: center; width: 45vw; overflow: hidden; border-radius: 5px; max-height: 100vh;">
        <div>
            <img class="img-fluid" src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
        </div>
        <div class="p-md-5" style="min-width: 25vw; text-align: center; color:#01022f;">
            <p class="text-white" style="font-size: 20px;">LOGIN FORM</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @error('email')
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                @else
                <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                @enderror

                @error('email')
                <span class="invalid-feedback mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                @error('password')
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                @else
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                @enderror

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="row justify-content-start mt-1">
                    <div class="col">
                        <a class="text-decoration-none d-inline form-text text-light" href="{{ route('register') }}">{{ __('Registrasi') }}</a>
                        <span class="form-text text-dark">jika belum memiliki akun</span>
                    </div>
                </div>
                <button class="btn btn-dark mt-3" type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</div>
@endsection
