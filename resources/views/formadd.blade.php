@extends('layouts/main')
@section('title', "FORM ADD PRODUK")
@section('content')
    <div class="card"></div>
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" min="0" name="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="">--PILIH KATEGORI--</option>
                    <option value="Rambut Kering">Rambut Kering</option>
                    <option value="Rambut Rusak Bahan Kimia">Rambut Rusak Bahan Kimia</option>
                    <option value="Rambut Normal">Rambut Normal</option>
                    <option value="Rambut Berminyak">Rambut Berminyak</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" name="gambar" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
@endsection
