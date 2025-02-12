<?php

namespace App\Http\Controllers;

use App\Models\Prodak;
use Illuminate\Http\Request;

class Frontcontroller extends Controller
{
    public function index()

    {
        $prodaks = Prodak::all();
       
        return view('frontend.index', compact('prodaks'));
    }

    public function about()
    {

        return view('frontend.about');
    }
    public function product(Request $request)
    {
        $prodaks = Prodak::all();

        return view('frontend.produk', compact('prodaks'));
    }

    public function show($id)
    {
        $prodak = Prodak::findOrFail($id); // Mengambil produk berdasarkan ID
    
        return view('frontend.detail', ['produk' => $prodak]); // Mengirim data ke tampilan
    }
    

    public function kontak()
    {

        return view('frontend.kontak');
    }

}
