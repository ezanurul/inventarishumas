<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\LogAktivitas;

class BarangMasukController extends Controller
{
    public function index() {
        $barang = Barang::all();
        $barangMasuk = BarangMasuk::with('barang')->get();
        return view('masuk.index', compact('barang', 'barangMasuk'));
    }
    public function store(Request $request) {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $data = $request->only(['barang_id', 'tanggal', 'jumlah']);
        BarangMasuk::create($data);
        $barang = Barang::find($request->barang_id);
        $barang->jumlah += $request->jumlah;
        $barang->save();

        LogAktivitas::create([
            'barang_id' => $request->barang_id,
            'aktivitas' => 'masuk',
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/masuk')->with('success', 'Data barang masuk berhasil disimpan.');
    }
}
