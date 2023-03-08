@extends('master')

@section('judul')

@if ($lelangs->status == 'ditutup')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat kepada <strong>{{ $lelangs->pemenang }}</strong></h5>
                <p class="card-text"> Telah memenangkan lelang untuk barang
                    <strong>{{ $lelangs->barang->nama_barang }}</strong> dengan harga
                    <strong>Rp{{ number_format($lelangs->harga_akhir) }}</strong>
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
                                <form action="{{ route('tawar.store', $lelangs->id) }}" method="POST">
                                @csrf
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            @if ($lelangs->status == 'dibuka')
                                            <div class="form-group">
                                                <label for="input">Input Harga Penawaran</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text"><strong>Rp.</strong></span>
                                                    </div>
                                                    <input type="text" name="harga_penawaran"
                                                        class="form-control @error('harga') is-invalid @enderror"
                                                        placeholder="Masukan Harga harus lebih dari @currency($lelangs->barang->harga_awal)">
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
                    <strong>Entry Riwayat Penawaran {{ $lelangs->barang->nama_barang }}</strong>
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
                        @if (auth()->user()->level == 'admin')
                        <th>Status</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($histories as $history)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->barang->nama_barang }}</td>
                            <td>@currency($history->harga_penawaran)</td>
                            <td>{{ \Carbon\Carbon::parse($history->tanggal)->format('j-F-Y') }}</td>
                            <td>
                                <span class="badge {{ $history->status == 'pending' ? 'bg-warning' : 'bg-success' }}"></span>
                            </td>
                            @if (auth()->user()->level == 'admin')
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('lelang.show', $history->id) }}">
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
</section>

@endsection