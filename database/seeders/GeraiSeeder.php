<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gerai;

class GeraiSeeder extends Seeder
{
    public function run(): void
    {
        Gerai::create([
            'id_gerai' => 'G1',
            'nama' => 'Gerai Dago',
            'alamat' => 'Jl. Ir Hj Djuanda 115',
            'kota' => 'Bandung',
            'telepon' => '0227206678'
        ]);

        Gerai::create([
            'id_gerai' => 'G2',
            'nama' => 'Gerai Soekarno Hatta',
            'alamat' => 'Jl. Soekarno Hatta 21',
            'kota' => 'Bandung',
            'telepon' => '0227507283'
        ]);

        Gerai::create([
            'id_gerai' => 'G3',
            'nama' => 'Gerai Gatot Subroto',
            'alamat' => 'Jl. Gatot Subroto 15',
            'kota' => 'Bandung',
            'telepon' => '0227497644'
        ]);
    }
}