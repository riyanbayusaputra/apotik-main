<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kode_produk',
        'harga',
        'id_kategori',
        'harga_beli',
        'harga_jual',
        'diskon',
        'stok',
        'merk', // Foreign key ke tabel kategori
    ];

    // Definisikan relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }

    protected $primaryKey = 'id_produk';
    protected $guarded = [];


}
