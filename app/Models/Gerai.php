<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    protected $table = 'gerais';
    protected $primaryKey = 'id_gerai';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_gerai', 'nama', 'alamat', 'kota', 'telepon'];
}
