@extends('master')

@section('judul')
<h1>Data Barang</h1>
@endsection

@section('content')

<div class="card">
  <div class="card-header d-flex justify-content-between mb-3">
    @if (auth()->user()->level === 'admin')
    <a href="/barang/create" class="btn btn-primary">Tambah Barang</a>
    @endif
  </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover" class="datatable">
        <thead>
        <tr>
          <th>NO</th>
          <th>Nama Barang</th>
          <th>Tanggal</th>
          <th>Harga Awal</th>
          <th><center>Actions</center></th>
          </tr>
        </thead>
        <tbody>
        <tr>
          @forelse ($barangs as $barang) 
          <tr>
            <td >{{ $loop -> iteration }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->tanggal }}</td>
                <td>@currency ( $barang->harga_awal) </td>
                <td>
                  <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                  <form action="{{route('barang.destroy', $barang->id)}}" method="POST">
                    <a class="btn btn-info mr-3" href="{{route('barang.show', $barang->id)}}">
                        <i class="far fa-eye"></i>
                      Detail
                    </a>
                    @if (auth()->user()->level === 'admin')
                    <a class="btn btn-warning mr-3" href="{{route('barang.edit', $barang->id)}}">
                      <i class="fas fa-edit"></i>
                      Edit
                    </a>
                    @endif
                    
                    @csrf
                    @method('DELETE')
                    @if (auth()->user()->level === 'admin')
                    <button type="submit" value="Delete" class="btn btn-danger">
                      <i class="fas fa-trash"></i>
                      hapus
                    </button>
                    @endif
                  </form>
                  </div>
                </td>
              </tr>
            </tr>
            @empty
            <tr>
              <td colspan="5" style="text-align: center" class="text-danger"><strong> Data Barang Kosong</strong></td>
            </tr>
            @endforelse ($barangs as $barang)
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection

@push('skrip')
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
@endpush