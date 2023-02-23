@extends('master')

@section('content')


    <!-- Default box -->
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
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $jumlahbarang }}</h3>
            
            <p>Jumlah Barang</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="/barang" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
        </div>
  
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $jumlahuser }}</h3>
              
              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="/user" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
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
    <!-- /.card -->

    
  </section>
  @endsection