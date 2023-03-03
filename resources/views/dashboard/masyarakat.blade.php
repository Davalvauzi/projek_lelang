@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>Dashboard</strong></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
    <div class="row">
      
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $lelangs->count() }}</h3>
            
            <p>Jumlah Lelang</p>
          </div>
          <div class="icon">
            <i class="fas fa-gavel"></i>
          </div>
          <a href="/lelang" class="small-box-footer">
            Info Lebih Lanjut<i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>  
    </div>
    
    <!-- /.card-body -->
    <div class="card-footer">
      
    </div>
    <!-- /.card-footer-->
  </div>

@endsection