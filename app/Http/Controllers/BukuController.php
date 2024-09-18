<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $books_data = Buku::all()->sortByDesc('id');
        // dd($books_data);

        // Hitung jumlah data buku
        $jumlah_buku = $books_data->count();

        $total_harga = $books_data->sum('price');
        return view('index', compact('books_data' , 'jumlah_buku', 'total_harga'));
    }
}