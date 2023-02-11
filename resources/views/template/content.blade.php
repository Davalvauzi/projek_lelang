<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-Wfluid">
            <div class="row mb-2">
                <div class="col-sm-6" class="judul">
                    @yield('judul') 
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    
    <section class="content">

        <!-- Default box -->
        @yield('content')
        @yield('isi')
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>