@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Data Barang</h3>
    <table class="table table-bordered">
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
