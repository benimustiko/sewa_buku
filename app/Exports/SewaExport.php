<?php

namespace App\Exports;

use App\Models\Sewa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SewaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $sewas = Sewa::all();
        foreach ($sewas as $index => $sewa) {
            $datas[] = [$index + 1, $sewa->user->name, $sewa->user->alamat, $sewa->user->no_hp, $sewa->book->judul, $sewa->tgl_pinjam, $sewa->tgl_kembali, $sewa->dibayar == 0 ? 'belum' : 'lunas', $sewa->dibayar == 0 ? 'perlu konfirmasi' : 'dipinjam', $sewa->dipinjam == 0 ? '-' : 'dikembalikan', $sewa->total];
        }
        return collect($datas);
    }

    public function headings(): array
    {
        return ['No', 'Nama', 'Alamat', 'No Hp', 'Judul', 'Pinjam', 'Kembali', 'Dibayar', 'Status', 'Dikembalikan', 'Total'];
    }
}
