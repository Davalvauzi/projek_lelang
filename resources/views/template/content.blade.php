<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-Wfluid">
            <div class="row mb-2">
                <div class="col-sm-6" class="judul">
                    @yield('judul') 
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