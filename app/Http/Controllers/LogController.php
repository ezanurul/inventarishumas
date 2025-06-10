<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogAktivitas;

class LogController extends Controller
{
    public function index() {
        $log = LogAktivitas::with('barang')->orderBy('tanggal', 'desc')->get();
        return view('log.index', compact('log'));
    }
}
