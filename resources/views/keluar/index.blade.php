@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Barang Keluar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/keluar">
        @csrf

        <div class="mb-3">
            <label for="barang_id">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                   value="{{ old('tanggal') }}"
                   class="form-control @error('tanggal') is-invalid @enderror" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="1"
                   value="{{ old('jumlah') }}"
                   class="form-control @error('jumlah') is-invalid @enderror" required>
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penerima">Penerima</label>
            <input type="text" name="penerima" id="penerima"
                   value="{{ old('penerima') }}"
                   class="form-control @error('penerima') is-invalid @enderror" required>
            @error('penerima')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <h4>Data Barang Keluar</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $bk)
                <tr>
                    <td>{{ $bk->barang->nama_barang ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($bk->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $bk->jumlah }}</td>
                    <td>{{ $bk->penerima }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
