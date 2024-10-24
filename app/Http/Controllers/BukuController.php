<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        $batas = 5;
        $cari = null; // Inisialisasi variabel $cari
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah_buku = $data->count();
        $total_harga = $data->sum('price');
        
        return view('index', compact('data', 'jumlah_buku', 'total_harga', 'data_buku', 'no', 'cari'));
    }
    

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string:30',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
        ]);

        $buku = new Buku();
        $buku->title = $request->title;
        $buku->author = $request->author;
        $buku->price = $request->price;
        $buku->published_date = $request->published_date;
        $buku->save();
        
        return redirect('/buku')->with('created', 'Data Buku Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('deleted', 'Data Buku Berhasil Dihapus!');
    }


    public function edit (string $id)
    {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    public function update (Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'published_date' => 'required',
        ]);
        $buku = Buku::find($id);
        $buku->title = $request->title;
        $buku->author = $request->author;
        $buku->price = $request->price;
        $buku->published_date = $request->published_date;
        $buku->save();
        return redirect('/buku')->with('update', 'Data Buku Berhasil Diedit!');
    }

    public function search(Request $request)
    {   
        Paginator::useBootstrapFive();
        $data=Buku::all();
        $batas=5;
        $cari = $request->kata;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::where('title', 'like', "%".$cari."%")->orwhere('author', 'like', "%".$cari."%")->paginate($batas);
        $no= $batas * ($data_buku->currentPage() - 1);
        $total_harga = $data->sum('price');
        return view('index', compact(  'data','jumlah_buku', 'cari','data_buku', 'total_harga', 'no'));
    }

    //auth
    

}