@extends('layouts/main')
@section('title', "Produk")
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/produk/form-add" class="btn btn-primary"><i class="bi bi-patch-plus"></i> Tambah Produk</a>
        </div>
        <div class="card-body">
            @if(session('alert'))
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pr as $idx => $p)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>
                                <img src="{{ asset('/storage//'.$p->gambar) }}" alt="{{ $p->gambar }}" height="100" width="200">
                            </td>
                            <td>
                                <a href="/form-edit/{{$p->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="/delete/{{$p->id}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
