<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Exports\SewaExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class DaftarSewaController extends Controller
{
    public function index()
    {
        $sewas = Sewa::all();
        return view('daftar_sewa.index', ['sewas' => $sewas]);
    }

    public function konfirmasi($id)
    {
        $sewa = Sewa::findOrFail($id);
        $today = Carbon::now()->toDateString();
        $tgl_kembali = Carbon::now()
            ->addDays($sewa->durasi)
            ->toDateString();
        $sewa->update([
            'tgl_pinjam' => $today,
            'tgl_kembali' => $tgl_kembali,
            'dibayar' => 1,
            'dipinjam' => 1,
        ]);

        return redirect('/daftarsewa')->with('success', ' Data telah diperbaharui!');
    }

    public function destroy($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new SewaExport(), 'sewa.xlsx');
    }
}
