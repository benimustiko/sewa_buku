@extends('layouts.app')

@section('content')
<div class="container-fluid" style=" min-height: 100vh">
    <div class="row justify-content-center">
        <div class="card p-4 mt-5" style="max-width: 70vw; min-height: 60vh">
            <div class="card-body" style="height: 100%">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ URL::to('/') }}/img/{{ $book->sampul }}" style="max-height: 300px" class="img-fluid rounded">
                    </div>
                    <div class="col d-flex flex-column" style=" min-height: 50vh">
                        <h1 class="card-title">{{ $book->judul }}</h1>
                        <p class="card-text">{{ $book->isi }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
