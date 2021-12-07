@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="/books" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    value={{ old('judul') }}>
            </div>
            @error('judul')
                <div class="form-text text-danger">
                    Judul harus di isi
                </div>
            @enderror
            <div class="mt-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <input type="text" class="form-control @error('sinopsis') is-invalid @enderror" id="sinopsis" name="sinopsis"
                    value={{ old('sinopsis') }}>
            </div>
            @error('sinopsis')
                <div class="form-text text-danger">
                    Sinopais harus di isi
                </div>
            @enderror
            <div class="mt-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                    value={{ old('harga') }}>
            </div>
            @error('harga')
                <div class="form-text text-danger">
                    Harga harus di isi
                </div>
            @enderror

            <div class="form-floating mt-4">
                <textarea class="form-control @error('isi') is-invalid @enderror" placeholder="Masukkan isi buku" id="isi"
                    style="height: 100px" name="isi">{{ old('isi') }}</textarea>
                <label for="isi">Isi</label>
            </div>
            @error('isi')
                <div class="form-text text-danger">
                    Isi buku harus di isi
                </div>
            @enderror


            <div class="mt-3">
                <label for="sampul" class="form-label">Sampul</label>
                <input onchange="preview()" type="file" class="form-control @error('xxx') is-invalid @enderror mb-3"
                    id="sampul" aria-describedby="sampulHelp" name="sampul">
                <img class="img-thumbnail" style="display: none;" id="output" src="" width="100px" />
            </div>
            @error('sampul')
                <div class="form-text text-danger">
                    Sampul harus di isi
                </div>
            @enderror
            <a href="/books" class="text-decoration-none">Kembali ke halaman buku</a>
            <div>
                <button type="submit" class="btn btn-primary mt-3 mb-5" name="submit">SUBMIT</button>
            </div>
        </form>
    </div>

    <script>
        function preview() {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = "block";

        }
    </script>
@endsection
