<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'kategori_id',
    ];
    // Relasi belongs-to ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
