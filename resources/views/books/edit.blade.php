@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-5">
            <form method="POST" action="/books/{{ $book->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div>
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') 'is-invalid' @enderror" id="judul" name="judul" value="{{ $book->judul }}">
                </div>
                @error('judul')
                <div class="form-text text-danger">
                    Judul harus di isi
                </div>
                @enderror
                <div class="mt-3">
                    <label for="sinopsis" class="form-label">Sinopsis</label>
                    <input type="text" class="form-control @error('xxx') 'is-invalid' @enderror" id="sinopsis" name="sinopsis" value="{{ $book->sinopsis }}">
                </div>
                @error('sinopsis')
                <div class="form-text text-danger">
                    sinopsis harus di isi
                </div>
                @enderror
                <div class="mt-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') 'is-invalid' @enderror" id="harga" name="harga" value="{{ $book->harga }}">
                </div>
                @error('harga')
                <div class="form-text text-danger">
                    Harga harus di isi
                </div>
                @enderror

                <div class="form-floating mt-4">
                    <textarea class="form-control @error('isi') 'is-invalid' @enderror" placeholder="Masukkan isi buku" id="isi" style="height: 100px" name="isi"> {{ $book->isi }}</textarea>
                    <label for="isi">Isi</label>
                </div>
                @error('isi')
                <div class="form-text text-danger">
                    Isi buku harus di isi
                </div>
                @enderror


                <div class="mt-3">
                    <label for="sampul" class="form-label">Sampul</label>
                    <input type="file" class=" mb-3 form-control @error('xxx') 'is-invalid' @enderror" id="sampul" onchange="preview()" name="sampul" value="{{ URL::to('/') }}/img/{{ $book->sampul }}">
                    <img style="display: none;" class="img-thumbnail mt-3 hidden" id="output" src="" alt="" width="100px">
                </div>
                @error('sampul')
                <div class="form-text text-danger">
                    Sampul harus di isi
                </div>
                @enderror
                <a href="/books" class="text-decoration-none mt-3">Kembali ke halaman buku</a>
                <div>
                    <button type="submit" class="btn btn-primary mt-3 mb-5">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function preview() {
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = "block";
    }

</script>
@endsection
