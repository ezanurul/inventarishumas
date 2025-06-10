<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama_barang', 'jumlah'];
    protected $table = 'barang';
    public function masuk() { return $this->hasMany(BarangMasuk::class); }
    public function keluar() { return $this->hasMany(BarangKeluar::class); }
    public function log() { return $this->hasMany(LogAktivitas::class); }
}
