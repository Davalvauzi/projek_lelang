@extends('master')

@section('title')
Lelang terpercaya 
@endsection

@section('content')
<section class="section">
  <div class="card">
      <div class="card-header bg-primary">
        <h3 class="card-title bg-primary text-white">Info Barang Lelang</h3>
      </div>
      <div class="card-body">
          <table class="table table-bordered table-hover" style="width: 100%" id="table1">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga Awal</th>
                      <th>Harga akhir</th>
                      <th>Tanggal Lelang</th>
                      <th>Status</th>
                      <th><center>Action</center> </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($lelangs as $lelang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::of($lelang->barang->nama_barang)->title() }}</td>
                    <td>{{ $lelang->barang->harga_awal }}</td>
                    <td>{{ $lelang->harga_akhir }}</td>
                    <td>{{ $lelang->tanggal }}</td>
                    <td>
                      <span class="badge {{ $lelang->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelang->status) }}</span>
                      
                    </td>
                    <td> 
              <a href="{{ route('lelang.show', $lelang->id) }}" class="btn btn-info mr-3">Detail</a>
              <a href="{{ route('lelang.tawar', $lelang->id)}}" class="btn btn-warning mr-3">Tawar</a>
            </td>
          </tr>
          @endforeach

              </tbody>
          </table>
      </div>
  </div>

</section>
@endsection