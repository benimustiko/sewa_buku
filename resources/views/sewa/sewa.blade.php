@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('SEWA') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('submit') }}" class="d-flex flex-column">
                        @csrf
                        <input type="hidden" value="{{ $book->id }}" name="id">
                        <div>
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $book->judul }}" disabled>
                        </div>

                        @error('judul')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div>
                            <label for="harga" class="form-label mt-3 ">Harga Buku (Rp./Hari)</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $book->harga }}" disabled>
                        </div>

                        @error('harga')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="mt-3 mb-4">
                            <label for="durasi" class="form-label">Durasi Sewa</label>
                            <input type="durasi" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" value="{{ old('durasi') }}" placeholder="Durasi (hari)" autofocus>
                        </div>

                        @error('durasi')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="col-2 align-self-center">
                            <button type="submit" class="btn btn-primary">{{ __('SUBMIT') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
