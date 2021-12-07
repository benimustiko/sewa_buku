@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datas as $index => $data)

                <?php
                        $tgl_pinjam = new DateTime($sewas[$index]->tgl_pinjam);
                        $tgl_kembali = new DateTime($sewas[$index]->tgl_kembali);
                        $sisa_hari = $interval = $tgl_pinjam->diff($tgl_kembali)->d;
                        $isBorrowed = $sewas[$index]->dipinjam == 1;
                        $isPaid = $sewas[$index]->dibayar == 1;
                        ?>
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td><img class="img-thumbnail" width="100px" src="img/{{ $data->sampul }}"></td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->sinopsis }}</td>
                    @if (!$isPaid && !$isBorrowed && $sisa_hari > 0)
                    <td>{{ 'Menunggu konfirmasi' }}</td>
                    <td>
                        <a href="/daftarsewa/{{ $data->id }}" class="btn btn-primary">HUBUNGI ADMIN</a>
                    </td>
                    @elseif ($isBorrowed && $sisa_hari < 1) <form id="kembalikan" action="bukumu/{{ $data->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        </form>
                        <script>
                            for (let i = 0; i < 1; i++) {
                                kembalikan.submit().preventDefault();
                            }

                        </script>
                        <td>{{ 'Telah dikembalikan  ?>' }}</td>
                        <td>
                            <a href="/bukumu/{{ $data->id }}" class="btn btn-success">HUBUNGI ADMIN</a>
                        </td>
                        @elseif (!$isBorrowed) <td>{{ 'Telah dikembalikan' }}
                        </td>
                        <td>
                            <a href="/bukumu/{{ $data->id }}" class="btn btn-primary">HUBUNGI ADMIN</a>
                        </td>
                        @else
                        <td>{{ $sisa_hari }} Hari tersisa</td>
                        <td>
                            <a href="/bukumu/{{ $data->id }}" class="btn btn-success">BACA</a>
                            <form action="bukumu/{{ $data->id }}" method="POST" class="d-inline">
                                @method('PUT')
                                @csrf

                                <button type="submit" class="btn btn-primary ">KEMBALIKAN</button>
                            </form>
                        </td>
                        @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
