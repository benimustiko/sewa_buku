<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sewa;

class BukumuController extends Controller
{
    public function index()
    {
        $sewas = User::findOrFail(Auth()->user()->id)->sewas;
        $books = [];
        foreach ($sewas as $sewa) {
            $book_id = $sewa->book_id;
            $books[] = Sewa::findOrFail($book_id)->book;
        }

        return view('bukumu.index', [
            'datas' => $books,
            'sewas' => $sewas,
        ]);
    }

    public function kembalikan($id)
    {
        $sewa = Sewa::findOrFail($id)->update([
            'dipinjam' => 0,
        ]);

        return redirect()->back();
    }

    public function baca($id)
    {
        $book = Sewa::findOrFail($id)->book;

        return view('bukumu.baca', ['book' => $book]);
    }
}
