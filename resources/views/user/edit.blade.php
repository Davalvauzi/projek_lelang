@extends('master')

@section('judul')
<h1>Halaman Edit</h1>
@endsection

@section('isi')

<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">EDIT DATA USER</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('user.update', [$users->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-12">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="{{$users->username}}">
            </div>
          </div>  
          <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="level">Otoritas</label>
                  <select name="level" id="level" class="form-select form-control" data-parsley-required>
                    <option value="" disabled><strong>PILIH ROLE</strong></option>
                    <option value="masyarakat">Masyarakat</option>
                    <option value="petugas">Petugas</option>
                  </select>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" name="password" class="form-control" id="password" value="{{$users->password}}">
            </div>
          </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
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
    </form>
  </div>
</div>
@endsection