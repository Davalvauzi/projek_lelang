@extends('master')

@section('judul')
<h1>Profile User</h1>
@endsection

@section('content')

{{-- <div class="card">
  <div class="card-header d-flex justify-content-between mb-3">
    @if (auth()->user()->level === 'admin')
    <a href="/barang/create" class="btn btn-primary">Tambah Barang</a>
    @endif
    <h3><center>Edit Profile User</center></h3>
  </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
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
          @forelse ($users as $barang) 
          <tr>
            <td >{{ $loop -> iteration }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->tanggal }}</td>
                <td>@currency ( $barang->harga_awal) </td>
                <td>
                  <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                  <form action="{{asset('barang.destroy', $barang->id)}}" method="POST">
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
</div> --}}

  <!-- Main content -->
  {{-- @forelse ($users as $item) --}}
      
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('adminlte/dist/img/user4-128x128.jpg') }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">
                {{ Auth::user()->name }}
              </h3>

              <p class="text-muted text-center">
                {{ Auth::user()->username }}
              </p>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Tentang Kamu</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile Kamu</a></li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <strong><i class="fas fa-book mr-1"></i> Minat</strong>

                  <p class="text-muted">
                    {{ auth::user()->minat }}
                  </p>
    
                  <hr>
    
                  <strong><i class="fas fa-map-marker-alt mrd-1"></i> Location</strong>
    
                  <p class="text-muted">
                    {{ auth::user()->alamat }}
                  </p>
    
                  <hr>
    
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" name="name" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="email" name="username" class="form-control" id="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Kamu"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  {{-- @empty
      <strong>Data Kosong</strong>
  @endforelse --}}
  <!-- /.content -->

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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush