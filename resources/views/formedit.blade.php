@extends('layouts/main')
@section('title', "FORM ADD PRODUK")
@section('content')
    <div class="card"></div>
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/update/{{$p->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" Value="{{$p->nama}}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{$p->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" min="0" name="harga" class="form-control" Value="{{$p->harga}}"required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="0">--PILIH KATEGORI--</option>
                    <option value="Rambut Kering" {{($p->kategori == "Rambut Kering")? "selected":""}}>Rambut Kering</option>
                    <option value="Rambut Rusak Bahan Kimia" {{($p->kategori == "Rambut Rusak Bahan Kimia")? "selected":""}}>Rambut Rusak Bahan Kimia</option>
                    <option value="Rambut Normal" {{($p->kategori == "Rambut Normal")? "selected":""}}>Rambut Normal</option>
                    <option value="Rambut Berminyak" {{($p->kategori == "Rambut Berminyak")? "selected":""}}>Rambut Berminyak</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" name="gambar" class="form-control-file" required>
            </div>
            <div class="form-group">
                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->gambar }}" height="80" width="170">
            </div>
             <div class="form-group"></div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
             </form>
    </div>
@endsection
