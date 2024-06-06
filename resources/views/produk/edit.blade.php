@extends('layoutt.template')
<!-- START FORM -->
@section('konten')


<form action='{{ url('produk/'.$data->kode) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('produk') }}' class="btn btn-secondary"><< kembali </a>
        <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">KODE</label>
            <div class="col-sm-10">
                {{ $data->kode }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kategori' value="{{ $data->kategori }}" id="kategori">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->    
@endsection
