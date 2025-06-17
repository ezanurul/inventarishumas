@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Data Barang</h3>

    <!-- Form Input Barang -->
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Tabel Barang -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $index => $b)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection