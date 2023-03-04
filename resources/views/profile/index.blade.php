@extends('master')

@section('judul')
<h1>Profile User</h1>
@endsection

@section('content')

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
                  <strong><i class="fas fa-user mr-1"></i> Nama </strong>

                  <p class="text-muted">
                    <strong> nama : </strong>{{ auth::user()->name }}
                    <br>
                    <strong> username : </strong>{{ auth::user()->username }}
                  </p>
    
                  <hr>
    
                  <strong><i class="fas fa-phone"></i> No Telepon</strong>

                  <p class="text-muted">
                    <strong> No Telepon :</strong> {{ auth::user()->telepon }}
                  </p>
    
                  <hr>

                  <strong><i class="fas fa-map-marker-alt mrd-1"></i> Alamat</strong>
    
                  <p class="text-muted">
                   <strong> lokasi :</strong> {{ auth::user()->alamat }}
                  </p>
    
                  <hr>

                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                
                {{-- <form action="{{ route('profile.update', [$users->id]) }}" method="POST">
                  @csrf
                  @method('PUT') --}}
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
                      <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                      <div class="col-sm-10">
                        <input type="email" name="telepon" class="form-control" id="telepon" placeholder="telepon">
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
                        <button type="submit" class="btn btn-warning">Submit</button>
                      </div>
                    </div>
                  </form> 
                </div>
                </form>
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
