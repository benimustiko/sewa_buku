<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required|max:70',
            'harga' => 'required',
            'sampul' => 'required',
            'isi' => 'required',
        ]);

        $sampul = $request->sampul;
        $sampulname = $sampul->getClientOriginalName();
        $request->sampul->move(public_path('img'), $sampulname);

        Book::create([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'harga' => $request->harga,
            'sampul' => $sampulname,
            'isi' => $request->isi,
        ]);

        return redirect('/books');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', [
            'book' => $book,
            'title' => 'Edit Buku',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'harga' => 'required',
            'sampul' => 'required',
            'isi' => 'required',
        ]);

        $book = Book::findOrFail($id);

        if ($request->sampul != '') {
            $path = public_path('img/');

            //code for remove old file
            if ($book->sampul != '' && $book->sampul != null) {
                $sampul_old = $path . $book->sampul;
                unlink($sampul_old);
            }

            //upload new file
            $sampul = $request->sampul;
            $sampulname = $sampul->getClientOriginalName();
            $sampul->move($path, $sampulname);

            $buku = Book::find($id)->update([
                'judul' => $request->judul,
                'sinopsis' => $request->sinopsis,
                'harga' => $request->harga,
                'sampul' => $sampulname,
                'isi' => $request->isi,
            ]);
            return redirect()
                ->route('books')
                ->with('success', ' Data telah diperbaharui!');
        }
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('/books');
    }
}

/*

$validated = $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'harga' => 'required',
            'sampul' => 'required',
        ]);

        $fileName = time() . '.' . $request->sampul->extension();
        $request->sampul->move(public_path('img'), $fileName);

        $buku = Book::find($id)->update([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'harga' => $request->harga,
            'sampul' => $fileName,
        ]);

        return redirect('/books')->with('success', ' Data telah diperbaharui!');



*/
