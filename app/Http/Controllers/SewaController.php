<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Sewa;
use Carbon\Carbon;

class SewaController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        return view('sewa.sewa', ['book' => $book]);
    }

    public function sewa(Request $request)
    {
        $today = Carbon::now()->toDateString();
        $book = Book::findOrFail($request->id);
        $durasiSewa = $request->durasi;
        $tgl_kembali = Carbon::now()
            ->addDays($durasiSewa)
            ->toDateString();

        return view('sewa.checkout', [
            'book' => $book,
            'today' => $today,
            'durasiSewa' => $durasiSewa,
            'tgl_kembali' => $tgl_kembali,
        ]);
    }

    public function checkout(Request $request)
    {
        $fileName = time() . '.' . $request->bukti_bayar->extension();
        $request->bukti_bayar->move(public_path('bukti_bayar'), $fileName);

        $sewa = Sewa::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'durasi' => $request->durasi,
            'total' => $request->total,
            'bukti_bayar' => $fileName,
        ]);

        return redirect('/');
    }
}
