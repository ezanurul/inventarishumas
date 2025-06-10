<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\LogAktivitas;

class BarangKeluarController extends Controller
{
    public function index() {
        $barang = Barang::all();
        $barangKeluar = BarangKeluar::with('barang')->get();
        return view('keluar.index', compact('barang', 'barangKeluar'));
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'barang_id' => 'required|integer|exists:barang,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'penerima' => 'required|string|max:255',
        ]);

        // Simpan data barang keluar
        $data = $request->only(['barang_id', 'tanggal', 'jumlah', 'penerima']);
        BarangKeluar::create($data);

        // Kurangi jumlah stok barang
        $barang = Barang::find($request->barang_id);
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        // Catat log aktivitas
        LogAktivitas::create([
            'barang_id' => $request->barang_id,
            'aktivitas' => 'keluar',
            'jumlah' => $request->jumlah,
            'tanggal' => now(),
        ]);

        return redirect('/keluar')->with('success', 'Data barang keluar berhasil disimpan');
    }
}
