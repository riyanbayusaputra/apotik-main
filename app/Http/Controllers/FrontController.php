<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontcontroller extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {

        return view('frontend.about');
    }
    public function product(Request $request)
    {

        return view('frontend.produk');
    }

    public function show($id)
    {
        // Data produk yang hardcoded
        $produk = [
            1 => [
                'nama' => 'OB HERBAL 60ML',
                'gambar' => 'tema/img/obherbal.jpg',
                'harga' => 'Rp16.600,00',
                'deskripsi' => 'OB Herbal merupakan obat batuk dengan kandungan utama Jahe, Jeruk Nipis, dan Licorice. Obat ini membantu meredakan batuk dan melegakan tenggorokan.',
                'kategori' => 'Sirup',
                'manfaat' => 'Membantu meredakan batuk dan melegakan tenggorokan.',
                'dosis' => 'Dewasa : 3 x sehari 1 sendok makan (15ml), anak-anak : 3 x sehari 1/2 sendok makan (7.5ml)',
                'aturan_pakai' => 'Berikan setelah makan'
            ],
            2 => [
                'nama' => 'TEMPRA SYRUP 30ML',
                'gambar' => 'tema/img/tempra30.jpg',
                'harga' => 'Rp27.500,00',
                'deskripsi' => 'Meredakan demam dan rasa sakit, termasuk sakit kepala akibat flu, batuk pilek, atau pascavaksinasi.',
                'kategori' => 'Sirup',
                'manfaat' => 'Meringankan nyeri dan demam.',
                'dosis' => 'Anak usia 6 tahun: 10 ml, Anak usia 4-5 tahun: 7,5 ml, Anak usia 2-3 tahun: 5 ml',
                'aturan_pakai' => 'Bersama makanan atau tanpa makanan'
            ],
            3 => [
                'nama' => 'TEMPRA SYRUP 60ML',
                'gambar' => 'tema/img/tempra60.jpg',
                'harga' => 'Rp45.700,00',
                'deskripsi' => 'Meredakan demam dan rasa sakit, termasuk sakit kepala akibat flu, batuk pilek, atau pascavaksinasi.',
                'kategori' => 'Sirup',
                'manfaat' => 'Meringankan nyeri dan demam.',
                'dosis' => 'Anak usia 6 tahun: 10 ml, Anak usia 4-5 tahun: 7,5 ml, Anak usia 2-3 tahun: 5 ml',
                'aturan_pakai' => 'Bersama makanan atau tanpa makanan'
            ],
            4 => [
                'nama' => 'TEMPRA FORTE JERUK 60ML',
                'gambar' => 'tema/img/tempraforte2.jpg',
                'harga' => 'Rp52.700,00',
                'deskripsi' => 'Meredakan demam; mengurangi rasa sakit dan nyeri ringan, seperti sakit kepala, sakit gigi, atau sakit pada otot; menurunkan demam yang menyertai flu dan demam sesudah imunisasi.',
                'kategori' => 'Sirup',
                'manfaat' => 'Meringankan nyeri dan demam.',
                'dosis' => 'Anak usia 6–12 tahun: 5–10 ml, 3–4 kali sehari. Minimum interval penggunaan adalah 4 jam.
                            Anak usia di atas 12 tahun: 10–12,5 ml, 3–4 kali sekali atau sesuai petunjuk dokter. Minimum interval penggunaan adalah 4 jam.',
                'aturan_pakai' => 'Berikan setelah makan'
            ],
        ];

        // Mendapatkan data produk berdasarkan ID
        if (!isset($produk[$id])) {
            abort(404);
        }

        return view('frontend.detail', ['produk' => $produk[$id]]);
    }

    public function kontak()
    {

        return view('frontend.kontak');
    }

}
