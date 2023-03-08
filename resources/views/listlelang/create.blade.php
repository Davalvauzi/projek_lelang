@extends('master')

@section('judul')

@if ($lelangs[0]->status == 'ditutup')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat kepada <strong>{{ $lelangs[0]->pemenang }}</strong></h5>
                <p class="card-text"> Telah memenangkan lelang untuk barang
                    <strong>{{ $lelangs[0]->barang->nama_barang }}</strong> dengan harga
                    <strong>Rp{{ number_format($lelangs[0]->harga_akhir) }}</strong>
                </p>
            </div>
        </div>
@endif

@endsection

@section('isi')

<section class="content">
  <div class="container-fluid">
      @error('harga')
          <b class="form-control is-invalid mb-3">Erorr! {{ $message }}</b>
      @enderror
      @if (!empty($lelangs))
          <div class="row">

              <!-- /.col -->
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title bg-primary text-white">Masukan Penawaran Anda</h3>
                    </div>
                    {{-- card header --}}
                      <div class="card-body">
                          <div class="tab-content">
                              <div class="tab-pane active" id="details">
                                <form action="{{ route('tawar.store') }}" method="POST">
                                @csrf
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            @if ($lelangs[0]->status == 'dibuka')
                                            <div class="form-group">
                                                <label for="input">Input Harga Penawaran</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text"><strong>Rp.</strong></span>
                                                    </div>
                                                    <input type="text" name="harga_penawaran"
                                                        class="form-control @error('harga') is-invalid @enderror"
                                                        placeholder="Masukan Harga harus lebih dari @currency($lelangs[0]->barang->harga_awal)">
                                                        @error('harga')
                                                        <div class="invalid-feedback">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                          <div class="col-md-6 d-flex justify-content-end">
                                              <a href="/lelang" class="btn btn-outline-secondary">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                </form>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </div>
          </div>
      @endif
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-start">
                    <strong>Entry Riwayat Penawaran {{ $lelangs[0]->barang->nama_barang }}</strong>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Penawar</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal Penawaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($histories as $item)
                        <tr>
                            <td>{{ $loop->iteraion }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->lelang->barang->nama_barang }}</td>
                            <td>@currency($item->harga)</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}"></span>
                            </td>
                            @if (auth()->user()->level == 'admin')
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('lelang.show', $item->id) }}">
                                    <i class="fas fa-folder">View</i></a>
                                </td>
                                
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center" class="text-danger">
                                <strong>Tidak Ada Data</strong>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            
        </div>
    </div>










    {{-- <div class="card">
      <div class="card-header">
          <strong>Histori Pelelang {{ $lelangs[0]->barang->nama_barang }}</strong>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
              </button>
          </div>
      </div>
      <div class="card-body p-4">
          <div class="table-responsive">
              <table class="table table-bordered table-hover" class="datatable">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Penawara</th>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">Harga Penawaran</th>
                          <th scope="col">Tanggal Penawaran</th>
                          <th scope="col">Status</th>
                          @if (auth()->user()->level == 'petugas')
                              <th scope="col"></th>
                          @endif
                          @if (auth()->user()->level == 'admin')
                              <th scope="col"></th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($histories as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->user->name }}</td>
                              <td>{{ $item->lelang->barang->nama_barang }}</td>
                              <td>@currency($item->harga)</td>
                              <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                              <td>
                                  <span
                                      class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span>
                              </td>
                              @if (auth()->user()->level == 'admin')
                                  <td>
                                      <a class="btn btn-primary btn-sm"
                                          href="{{ route('lelang.show', $item->id) }}">
                                          <i class="fas fa-folder"></i>
                                          View
                                      </a>
                                  </td>
                              @endif
                              @if (auth()->user()->level == 'petugas')
                                  <td>
                                      <form action="{{ route('barang.destroy', [$item->id]) }}" method="POST">
                                          <a class="btn btn-primary btn-sm"
                                              href="{{ route('lelang.show', $item->id) }}">
                                              <i class="fas fa-folder"></i>
                                              View
                                          </a>
                                          <a class="btn btn-info btn-sm" href="">
                                              <i class="fas fa-pencil-alt"></i>
                                              Edit
                                          </a>
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger btn-sm" type="submit" value="Delete">
                                              <i class="fas fa-trash"></i>
                                              Delete
                                          </button>
                                      </form>
                                  </td>
                              @endif
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6" style="text-align: center" class="text-danger"><strong>Data masih
                                      kosong</strong></td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div> --}}
</section>

@endsection