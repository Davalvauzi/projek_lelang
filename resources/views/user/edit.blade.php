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
        <div class="form-group">
          <label for="username">Barang</label>
          <input type="text" name="username" class="form-control" id="username" value="{{$users->username}}">
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