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
                <option value="masyarakat">Masyarakat</option>
                <option value="petugas">Petugas</option>
              </select>
            </div>
          </div>
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