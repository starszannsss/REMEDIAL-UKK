<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    // Tambahkan ini - daftar kolom yang boleh diisi
    protected $fillable = [
        'id_barang',
        'kategori',
        'nama_barang',
        'harga',
        'stok',
        'suplier'
    ];

    // Atau alternatifnya, gunakan guarded (lebih longgar)
    // protected $guarded = [];

    public function suplierRelasi()
    {
        return $this->belongsTo(Suplier::class, 'suplier', 'id_suplier');
    }
}