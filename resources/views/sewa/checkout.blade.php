@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CHECKOUT') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('checkout') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div>
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $book->judul }}">
                        </div>

                        @error('judul')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div>
                            <label for="harga" class="form-label mt-3 ">Harga Buku (Rp./Hari)</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $book->harga }}">
                        </div>

                        @error('harga')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror


                        <div class="mt-3">
                            <label for="durasi" class="form-label">Durasi Sewa (hari)</label>
                            <input type="durasi" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" value="{{ $durasiSewa }}">
                        </div>

                        <div class="mt-3">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" name="tgl_pinjam" value="{{ $today }}">
                        </div>

                        <div class="mt-3">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" name="tgl_kembali" value="{{ $tgl_kembali }}">
                        </div>

                        <div class=" mt-3">
                            <label for="name" class="form-label">Nama lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        @error('name')
                        <div class=" form-text text-danger">
                            Nama lengkap harus di isi
                        </div>
                        @enderror
                        <div class="mt-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}">
                        </div>
                        @error('alamat')
                        <div class=" form-text text-danger">
                            Alamat harus di isi
                        </div>
                        @enderror
                        <div class="mt-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ auth()->user()->no_hp }}">
                        </div>
                        @error('no_hp')
                        <div class=" form-text text-danger">
                            No Hp harus di isi
                        </div>
                        @enderror
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        @error('email')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="mt-3 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ $book->harga * $durasiSewa }}">
                        </div>
                        @error('total')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="mt-3 mb-3">
                            <label for="total" class="form-label">No Rekening</label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="norek" value="542400245 (PT. BUKUKU)">
                        </div>
                        @error('total')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="mt-3 mb-3">
                            <label for="bukti_bayar" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" onchange="preview()" class="form-control @error('bukti_bayar') is-invalid @enderror" id="bukti_bayar" name="bukti_bayar">
                            <img style="display: none;" class="img-thumbnail mt-3 hidden" id="output" src="" alt="" width="100px">
                        </div>
                        @error('bukti_bayar')
                        <div class=" form-text text-danger">
                            Email harus di isi
                        </div>
                        @enderror

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('CHECKOUT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
