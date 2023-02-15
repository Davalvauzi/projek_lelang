@extends('master')

@section('judul')    
<h1>Halaman Create User</h1>
@endsection

@section('isi')

<div class="col-md-12">
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Masukan Data Operator</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('user.store')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
          </div>
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