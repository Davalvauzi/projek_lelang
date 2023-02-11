@extends('master')

@section('judul')    
<h1>Halaman Create</h1>
@endsection

@section('isi')

<div class="col-md-12">
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">MASUKAN BARANG YANG INGIN DILELANG</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('lelang.store')}}" method="POST" data-parsley-validate>
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="form-group mandatory">
              <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
              <select class="form-select form-control @error('barangs_id') is-invalid @enderror" id="barangs_id" name="barangs_id" data-parsley-required="true">
                <option value="" disabled><strong>Pilih Barang</strong></option>
                @forelse ($barangs as $item)
                  <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} -  {{ str::of($item->harga_awal) }}</option>
                @empty
                  <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
                @endforelse
              </select>
            </div>
            @error('barangs_id')
              <div class="aler alert-danger" role="alert">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                  <label for="tanggal" class="form-label">{{ __('Tanggal Lelang') }}</label>
                  <input type="date" id="tanggal_lelang" class="form-control @error('tanggal_lelang') is-invalid @enderror" name="tanggal_lelang" data-parsley-required="true" value="{{ old('tanggal_lelang') }}">
              </div>
              @error('tanggal_lelang')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
          </div>
          <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                  <label for="harga_awal" class="form-label">{{ __('Harga Akhir') }}</label>
                  <input type="text" id="harga_akhir" class="form-control @error('harga_akhir') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_akhir" data-parsley-required="true" value="{{ old('harga_akhir') }}">
              </div>
              @error('harga_akhir')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-start">
              <a href="{{ route('lelang.index') }}" class="btn btn-outline-info me-1 mb-1">
                {{ __('Kembali') }}
              </a>
          </div>
        <div class="col-6 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">
              {{ __('Submit') }}
            </button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
              {{ __('Reset') }}
            </button>
        </div>
      </div>
      </div>
      <!-- /.card-body -->
    </form>
  </div>
</div>
@endsection