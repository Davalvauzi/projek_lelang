@extends('master')

@section('judul')
<h1>Halaman Edit</h1>
@endsection

@section('isi')

<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">EDIT BARANG YANG INGIN DILELANG</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('barang.update', [$barangs->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <div class="row">
            <div class="col-md-5 col-12">
              <label for="nama_barang">Barang</label>
              <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{$barangs->nama_barang}}">
            </div>
            <div class="col-md-2 col-12">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$barangs->tanggal}}">        
            </div>
            <div class="col-md-5 col-12">
              <label for="harga_awal">Harga Awal</label>
              <input type="text" name="harga_awal" class="form-control" id="harga_awal" value="{{$barangs->harga_awal}}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi_barang">Deskripsi Barang</label>
          <textarea class="form-control" rows="3" id="deskripsi_barang" name="deskripsi_barang" value="{{$barangs->deskripsi_barang}}"></textarea>
        </div>
        @if ($barangs->image)
        <div class="form-group">
          <label for="foto_barang">Foto Barang</label>
          <div style="max-height: 350px; overflow:hidden;" >
            <img src="{{ asset('storage/' . $barangs->image) }}" alt="{{ $barangs->image }}" class="img-fluid mt-3">
          </div>
        </div>  
        @endif
        <div class="row">
          <div class="col-md-6 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="col-md-6 d-flex justify-content-end">
            <a href="/barang" class="btn btn-outline-info">Kembali</a>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </form>
  </div>
</div>
@endsection