@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <a href="/books/create" class="btn btn-success mb-3 ">TAMBAH</a>
    <div class="row justify-content-center">
        @foreach ($books as $book)
        <div class="col-3 mb-3">
            <div class="card p-3" style="min-height: 465px">
                <img src="img/{{ $book->sampul }}" class="card-img-top" class="card-img-top" alt="Card Image" style="max-height: 200px; object-fit: cover">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text mt-auto">{{ $book->sinopsis }}</p>
                    <p class="card-text mt-auto">Rp. {{ $book->harga }}</p>
                    <a href="/books/{{ $book->id }}" class="btn btn-primary mt-auto">DETAIL</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
