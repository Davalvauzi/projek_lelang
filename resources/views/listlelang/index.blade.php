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

                      <a href="{{ route('listlelang.show', $item->id) }}"
                        class="btn btn-info btn-block"><b>Detail Barang</b></a>
                      
                      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"> 
                          Tawar Barang
                      </button>

                      <form action="{{ route('listlelang.store', $lelangs->id) }}" method="POST" class="form-horizontal">
                        <div class="modal" id="myModal">
                          <div class="modal-dialog">
                            <div class="modal-content">
            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"><center> Masukan Nominal Penawaran</center></h4>
                                </div>
            
                                <!-- Modal body -->
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="form-group">
                                      <label for="harga_penawaran">Masukan Nominal</label>
                                      <input type="text" name="harga_penawaran" class="form-control" id="harga_penawaran">
                                    </div>
                                  </div>
                                </div>
            
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary justify-content-start" data-dismiss="modal">Submit</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </form>

                  </div>
                  <!-- /.card-body -->
              </div>

          </div>
      @endforeach
  </div>
</section>

@endsection

@push('skrip')
<script>
  $(document).ready(function () {
    $('#modal').click(function () {
      $('#ModalTawar').modal('show');
    });
  });
</script>
@endpush

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