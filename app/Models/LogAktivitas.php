<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    protected $fillable = ['barang_id', 'aktivitas', 'jumlah', 'tanggal'];
    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
