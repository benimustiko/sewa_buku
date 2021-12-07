@extends('layouts.app')

@section('content')
<div class="container-fluid">

    {{--
    <div class=" position-absolute top-50 start-50 translate-middle">

        <div class="card " style="min-width: 80vw; min-height: 60vh">
            <div class="card-body" style="height: 100%">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ URL::to('/') }}/img/{{ $book->sampul }}" style="max-height: 300px" class="img-fluid rounded">

</div>
<div class="col d-flex flex-column" style=" min-height: 50vh">
    <h5 class="card-title">{{ $book->judul }}</h5>
    <p class="card-text mt-auto">{{ $book->sinopsis }} </p>
    <p class="card-text mt-auto">Rp. {{ $book->harga }}</p>
    <a href="/sewa/{{ $book->id }}" class="btn btn-success mt-auto ms-auto col-3">SEWA</a>
</div>
</div>
</div>
</div>
</div>
<div class="row" style="height: 40vh; background-color: #3d5a80;"></div>
<div class="row" style=""></div> --}}


<div class="row justify-content-center mt-5">
    <div class="card p-4" style="max-width: 70vw; min-height: 60vh">
        <div class="card-body" style="height: 100%">
            <div class="row">
                <div class="col-3">
                    <img src="{{ URL::to('/') }}/img/{{ $book->sampul }}" style="max-height: 300px" class="img-fluid rounded">
                </div>
                <div class="col d-flex flex-column" style=" min-height: 50vh">
                    <h1 class="card-title">{{ $book->judul }}</h1>
                    <h6>SINOPSIS</h6>
                    <p class="card-text">{{ $book->sinopsis }} </p>
                    <p class="card-text mt-auto">Rp. {{ $book->harga }}</p>
                    <a href="/sewa/{{ $book->id }}" class="btn btn-success mt-auto col-3">SEWA</a>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
@endsection
