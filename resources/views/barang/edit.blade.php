@extends('master')

@section('judul')
<h1>Halaman Create</h1>
@endsection

@section('isi')

<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">MASUKAN BARANG YANG INGIN DILELANG</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('barang.update', [$barangs->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="nama_barang">Barang</label>
          <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{$barangs->nama_barang}}">
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$barangs->tanggal}}">        
        </div>
        <div class="form-group">
          <label for="harga_awal">Harga Awal</label>
          <input type="text" name="harga_awal" class="form-control" id="harga_awal" value="{{$barangs->harga_awal}}">
        </div>
        <div class="form-group">
          <label for="deskripsi_barang">Deskripsi Barang</label>
          <textarea class="form-control" rows="3" id="deskripsi_barang" name="deskripsi_barang" value="{{$barangs->deskripsi_barang}}"></textarea>
        </div>
        <div class="form-group">
          <label for="image">Foto</label>
          <input type="file" name="image" class="form-control" id="harga_awal" ">
          <img src="/image/{{ $barang->image }}" width="300px" alt="">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection