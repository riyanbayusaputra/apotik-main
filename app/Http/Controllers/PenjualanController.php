<?php

namespace App\Http\Controllers;

use App\Models\PembelianDetail;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;


class PenjualanController extends Controller
{
    public function index()
    {
        // Ambil data penjualan dengan relasi member
        $penjualan = Penjualan::with('member') // Pastikan relasi 'member' sudah didefinisikan
            ->orderBy('created_at', 'desc') // Sortir data
            ->paginate(5); // Gunakan pagination jika diperlukan

        // Kirim data ke view
        return view('penjualan.index', compact('penjualan'));
    }


    public function create()
    {
        $penjualan = new Penjualan();
        $penjualan->id_member = null;
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = auth()->id();
        $penjualan->save();

        session(['id_penjualan' => $penjualan->id_penjualan]);
        return redirect()->route('transaksi.index');
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::findOrFail($request->id_penjualan);
        $penjualan->id_member = $request->id_member;
        $penjualan->total_item = $request->total_item;
        $penjualan->total_harga = $request->total;
        $penjualan->diskon = $request->diskon;
        $penjualan->bayar = $request->bayar;
        $penjualan->diterima = $request->diterima;
        $penjualan->update();

        $detail = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();
        foreach ($detail as $item) {
            $item->diskon = $request->diskon;
            $item->update();

            $produk = Produk::find($item->id_produk);
            $produk->stok -= $item->jumlah;
            $produk->update();
        }

        return redirect()->route('transaksi.selesai');
    }
    public function destroy($id)
    {
        // Cari Penjualan berdasarkan id
        $penjualan = Penjualan::find($id);

        // Periksa apakah Penjualan ditemukan
        if (!$penjualan) {
            return redirect()->route('penjualan.index')->with('error', 'Penjualan tidak ditemukan.');
        }

        // Menghapus detail penjualan terkait
        $detail = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();
        foreach ($detail as $item) {
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $produk->stok += $item->jumlah;
                $produk->update();
            }

            // Menghapus detail penjualan
            $item->delete();
        }

        // Menghapus Penjualan
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('delete', 'Penjualan berhasil dihapus');
    }

    public function deletepenjualan($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('delete', 'Pengeluaran Berhasil Dihapus');

    }

    public function selesai()
    {

        return view('penjualan.selesai');
    }

    public function show($id)
    {
        $penjualanDetail = PenjualanDetail::with('produk')
            ->where('id_penjualan', $id)
            ->get();

        if ($penjualanDetail->isEmpty()) {
            return redirect()->route('penjualan.index')->with('error', 'Data detail tidak ditemukan.');
        }

        $penjualan = Penjualan::find($id);

        return view('penjualan.detail', compact('penjualan', 'penjualanDetail'));
    }

    public function notaKecil()
    {
        $penjualan = Penjualan::find(session('id_penjualan'));
        if (!$penjualan) {
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')
            ->where('id_penjualan', session('id_penjualan'))
            ->get();

        return view('penjualan.nota_kecil', compact('penjualan', 'detail'));
    }

    public function notaBesar()
    {
        $penjualan = Penjualan::find(session('id_penjualan'));
        if (!$penjualan) {
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')
            ->where('id_penjualan', session('id_penjualan'))
            ->get();

        $pdf = PDF::loadView('penjualan.nota_besar', compact('penjualan', 'detail'));
        $pdf->setPaper(0, 0, 609, 440, 'potrait');
        return $pdf->stream('Transaksi-' . date('Y-m-d-his') . '.pdf');
    }
    public static function grafik()
    {
        // Ambil data pengeluaran per bulan
        return Penjualan::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
    }


}
