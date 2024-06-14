@extends('layouts.main')
@section('title', 'Barang')
@section('artikel')
    <div class="card-header">
        <a href="/barang/add-form" class="btn btn-primary"><i class="bi bi-file-plus-fill"></i>barang</a>
    </div>
    <div class="card-body">
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            
        <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Bahan</th>
            <th>Jumlah Barang</th>
            <th>Merek</th>
            <th>Foto</th>
            <th>Aksi</th> <!-- Tambahkan kolom Aksi di header -->
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $idx => $item)
            <tr>
                <td>{{ $idx + 1 }}</td>
                <td>{{ $item->namabrg }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->bahan }}</td>
                <td>{{ $item->jumlahbrg }}</td>
                <td>{{ $item->merekBrg }}</td>
                <td>
                    <img src="{{ asset('storage/images/'.$item->foto) }}" alt="{{$item->foto}}" height="80" width="80">
                </td>
                <td>
                    <a href="/barang/edit-form/{{ $item->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="/delete/{{ $item->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
