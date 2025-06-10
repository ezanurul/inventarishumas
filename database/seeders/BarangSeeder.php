<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run() {
        $list = [
            'Note book baru','Note book lama','Block Note','Kalender duduk','Kalender dinding',
            'Paper bag','Plakat','Tas Premium','Tas Fecil','Mug','Pouch'
        ];
        foreach ($list as $nama) {
            Barang::create(['nama_barang' => $nama, 'deskripsi' => '-', 'jumlah' => 0]);
        }
    }
}
