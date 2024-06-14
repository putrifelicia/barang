@extends('layouts.main')
@section('title', 'Form Add Barang')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label> Nama Barang </label>
                    <input type="text" name="namabrg" class="form-control" value="{{ old('namabrg', $barang->namabrg ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label> Harga </label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label> Bahan </label>
                    <input type="text" name="bahan" class="form-control" value="{{ old('bahan', $barang->bahan ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label> Jumlah Barang </label>
                    <input type="number" name="jumlahbrg" class="form-control" value="{{ old('jumlahbrg', $barang->jumlahbrg ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label> Merek Barang </label>
                    <input type="text" name="merekBrg" class="form-control" value="{{ old('merekBrg', $barang->merekBrg ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                </div>
                @if(isset($barang) && $barang->foto)
                <div class="form-group">
                    <img src="{{ asset('/storage/fotos/'.$barang->foto) }}" alt="{{ $barang->foto }}" height="80" width="80">
                </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection