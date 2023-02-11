@extends('master')

@section('judul')    
<h1>Halaman Create</h1>
@endsection

@section('isi')

<div class="col-md-12">
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Masukan Data Barang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('barang.store')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="nama_barang">Barang</label>
              <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukan nama barang">
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukan tanggal">
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="harga_awal">Harga Awal</label>
            <input type="text" name="harga_awal" class="form-control" id="harga_awal" placeholder="Masukan harga awal">
          </div>
          <div class="form-group">
            <label for="deskripsi_barang">Deskripsi Barang</label>
            <textarea class="form-control" rows="3" id="deskripsi_barang" name="deskripsi_barang" placeholder="Deskripsi barang anda"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 d-flex justify-content-start">
              <button type="submit" class="btn btn-primary">Submit</button> 
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <a href="/barang" class="btn btn-outline-info">
                Kembali
              </a>
            </div>
          </div>
      </div>
      <!-- /.card-body -->
    </form>
  </div>
</div>
@endsection