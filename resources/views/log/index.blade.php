@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Log Aktivitas Barang</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Aktivitas</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($log as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ ucfirst($item->aktivitas) }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
