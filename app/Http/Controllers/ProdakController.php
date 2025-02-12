<?php

namespace App\Http\Controllers;

use App\Models\Prodak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdakController extends Controller
{
    public function index()
    {
        $prodaks = Prodak::all();
        return view('prodak.index', compact('prodaks'));
    }

    public function create()
    {
        return view('prodak.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required|string|max:255',
            'gejala' => 'required|string|max:255',
            'usia' => 'required|string|max:255',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'manfaat' => 'required|string',
            'dosis' => 'required|string',
            'aturan_pakai' => 'required|string',
        ]);
    
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    
        Prodak::create($data);
    
        return redirect()->route('prodak.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    

    public function show(Prodak $prodak)
    {
        return view('prodak.show', compact('prodak'));
    }

    public function edit(Prodak $prodak)
    {
        return view('prodak.edit', compact('prodak'));
    }

    public function update(Request $request, Prodak $prodak)
{
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'gejala' => 'required|string|max:255',
        'usia' => 'required|string|max:255',
        'harga' => 'required|integer',
        'deskripsi' => 'required|string',
        'manfaat' => 'required|string',
        'dosis' => 'required|string',
        'aturan_pakai' => 'required|string',
        'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Tidak wajib diunggah
    ]);

    // Jika ada gambar baru, hapus gambar lama dan simpan yang baru
    if ($request->hasFile('logo')) {
        // Hapus gambar lama jika ada
        if ($prodak->logo) {
            Storage::disk('public')->delete($prodak->logo);
        }

        // Simpan gambar baru
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $prodak->update($data);

    return redirect()->route('prodak.index')->with('success', 'Prodak berhasil diperbarui.');
}


    public function destroy(Prodak $prodak)
    {
        $prodak->delete();
        return redirect()->route('prodak.index')->with('success', 'Prodak berhasil dihapus.');
    }
}
