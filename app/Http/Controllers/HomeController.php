<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        if (auth()->user()->is_admin == 0) {
            return view('home.home', ['books' => $books]);
        } else {
            return redirect()->route('daftarsewa');
        }
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('home.show', ['book' => $book]);
    }
}
