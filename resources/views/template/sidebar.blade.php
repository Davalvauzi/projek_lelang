<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('adminlte/index3.html')}}" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              @if (auth()->user()->level === 'admin')
                  
              @endif









               @if (auth()->user()->level == 'admin')  
               <li class="nav-item">
                 <a href="/user" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data User
                  </p>
                </a>
              </li>
              @endif
               @if (auth()->user()->level == 'admin')  
               <li class="nav-item">
                 <a href="/barang" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Barang
                  </p>
                </a>
              </li>
              @endif
              @if (auth()->user()->level == 'petugas')  
               <li class="nav-item">
                 <a href="/barang" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Barang
                  </p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/lelang" class="nav-link">
                 <i class="nav-icon fas fa-table"></i>
                 <p>
                   Data Lelang
                 </p>
               </a>
             </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>