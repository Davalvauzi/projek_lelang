@extends('master')

@section('judul')
<h1>Data Barang</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Database Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover" class="datatable">
        <thead>
        <tr>
          <th class="th1">NO</th>
          <th class="th2">Nama Barang</th>
          <th class="th3">Tanggal</th>
          <th class="th3">Harga Awal</th>
          <th class="th3">Deskripsi Barang</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          @foreach ($barangs as $barang)
              <tr>
                <td >{{ $loop -> iteration }}</td>
                <td >{{ $barang->nama_barang }}</td>
                <td >{{ $barang->tanggal }}</td>
                <td >{{ $barang->harga_awal }}</td>
                <td >{{ $barang->deskripsi_barang }}</td>
                <td>
                  <form action="{{route('barang.destroy', $barang->id)}}" method="POST">
                    <a class="btn btn-info mr-3" href="{{route('barang.show', $barang->id)}}">Detail</a>
                    <a class="btn btn-warning mr-3" href="{{route('barang.edit', $barang->id)}}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                </td>
                </tr>
          @endforeach
        </tr>
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection

{{-- @push('skrip')

<script src="{{asset ('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->-
<script src="{{asset ('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset ('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('adminlte/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush --}}