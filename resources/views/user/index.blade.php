@extends('master')

@section('judul')
<h1>Data User</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Database User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover" class="datatable">
        <thead>
        <tr>
          <th class="th1">NO</th>
          <th class="th2">Nama User</th>
          <th class="th3">Username</th>
          <th class="th3">Telepon</th>
          <th class="th3">Otoritas</th>
          {{-- <th class="th3">Deskripsi Barang</th> --}}
          </tr>
        </thead>
        <tbody>
        <tr>
          @forelse ($users as $user)
          <tr>
            <td >{{ $loop -> iteration }}</td>
            <td >{{ $user->name }}</td>
            <td >{{ $user->username }}</td>
            <td >{{ $user->telepon }}</td>
            <td >{{ $user->level }}</td>
            {{-- <td >{{ $barang->deskripsi_barang }}</td> --}}
            <td>
              <form action="{{route('user.destroy', $user->id)}}" method="POST">
                {{-- <a class="btn btn-info mr-3" href="{{route('barang.show', $barang->id)}}">Detail</a>
                <a class="btn btn-warning mr-3" href="{{route('barang.edit', $barang->id)}}">Edit</a> --}}

                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
            </tr>
          @empty
          <tr>
            <td colspan="5" style="text-align: center" class="text-danger"><strong> Data Barang Kosong</strong></td>
          </tr>
          @endforelse ($users as $user)
        </tr>
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection