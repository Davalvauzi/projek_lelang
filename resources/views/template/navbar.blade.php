<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('barang.index')}}" class="nav-link">Home</a>
      </li>
    </ul>
    {{-- right navbar links --}}
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout-petugas')}}" class="nav-link">Log out</a>
        {{-- <a href="#" class="nav-link">Contact</a> --}}
      </li>

    </ul>
  </nav>