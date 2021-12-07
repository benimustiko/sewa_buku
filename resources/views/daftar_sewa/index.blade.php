@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-2 me-auto">
            <a href="{{ route('export') }}" class="btn btn-dark">EXPORT</a>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pinjam</th>
                    <th scope="col">Kembali</th>
                    <th scope="col">Dibayar</th>
                    <th scope="col">Status</th>
                    {{-- <th scope="col">Dikembalikan</th> --}}
                    <th scope="col">Total</th>
                    <th scope="col">Bukti</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sewas as $index => $sewa)

                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $sewa->user->name }}</td>
                    <td>{{ $sewa->user->alamat }}</td>
                    <td>{{ $sewa->user->no_hp }}</td>
                    <td><a class="text-decoration-none" href="/books/{{ $sewa->book_id }}">{{ $sewa->book->judul }}</a></td>
                    <td>{{ $sewa->tgl_pinjam }}</td>
                    <td>{{ $sewa->tgl_kembali }}</td>
                    <td>{{ $sewa->dibayar == 0 && $sewa->dipinjam == 0 ? 'Menunggu konfirmasi' : 'Dibayar' }}</td>

                    @if ($sewa->dibayar == 0 && $sewa->dipinjam == 0)
                    <td>{{ 'Menunggu konfirmasi' }}</td>
                    @elseif($sewa->dibayar == 1 && $sewa->dipinjam == 1)
                    <td>{{ 'Dipinjam' }}</td>
                    @else
                    <td>{{ 'Dikembalikan' }}</td>
                    @endif

                    <td>Rp. {{ $sewa->total }}</td>
                    <td><img src="bukti_bayar/{{ $sewa->bukti_bayar }}" width="100px"></td>
                    <td>
                        @if ($sewa->dibayar == 0)
                        <a href="/daftarsewa/{{ $sewa->id }}" class="btn btn-primary">KONFIRMASI</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
