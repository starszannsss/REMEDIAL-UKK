<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{

    protected $table = 'supliers';
    protected $primaryKey = 'id_suplier';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_suplier','nama','alamat','kota','telepon'];


    public function barangs(){
        return $this->hasMany(Barang::class,'suplier', 'id_suplier');
    } 
}
