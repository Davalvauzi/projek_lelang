<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="" class="brand-link">
          <img src="{{ asset('img/ikan-kodok.png') }}" alt="Logo Dafa" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">
            {{ Auth::user()->username }}
          </span>
        </a>

    <a href=""></a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (auth()->user()->level == 'masyarakat')  
               <li class="nav-item">
                 <a href="/profile" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Profile
                  </p>
                </a>
              </li>
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