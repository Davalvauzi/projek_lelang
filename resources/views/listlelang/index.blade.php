@extends('master')

@section('judul')
<h1>List Lelang</h1>
@endsection

@section('content')

<section class="content">
  <div class="row">
      @foreach ($lelangs as $item)
          <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                      <div class="text-center">
                          @if ($item->barang->image)
                              <img src="{{ asset('storage/' . $item->barang->image) }}"
                                  alt="{{ $item->barang->nama_barang }}" class="img-fluid mt-0">
                          @endif
                      </div>
                      <h3 class="profile-username text-center">{{ $item->barang->nama_barang }}</h3>

                      <h5 class="text-muted text-center">@currency($item->barang->harga_awal)</h5>

                      <a href="{{ route('listlelang.create', $item->id) }}"
                          class="btn btn-success btn-block"><b>Tawar</b></a>
                  </div>
                  <!-- /.card-body -->
              </div>

          </div>
      @endforeach
  </div>
</section>

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