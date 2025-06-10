<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index() {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }
    public function store(Request $request) {
        Barang::create($request->only(['nama_barang', 'jumlah']));
        return redirect('/barang');
    }
}
