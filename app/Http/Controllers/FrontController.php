<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontcontroller extends Controller
{
    public function index() {
        return view('frontend.index');
    }

    public function about()
    {

        return view('frontend.about');
    }
    public function layanan()
    {

        return view('frontend.layanan');
    }

    public function galeri()
    {

        return view('frontend.galeri');
    }

    public function kontak()
    {

        return view('frontend.kontak');
    }

}
