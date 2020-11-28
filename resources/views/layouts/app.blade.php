<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-teal">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link navbar-teal">
                <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        @if(userCan('daftar.create') || userCan('daftar.list') || userCan('tagihan.list') || userCan('ikan.index')||userCan('tagihan.surplus.defisit'))
                        <li class="nav-header">ADMINISTRASI</li>
                        <li class="nav-item has-treeview {{  open_menu(['pendaftaran/*','pendaftaran','ikan/*','ikan']) }}">
                            <a href="#" class="nav-link  {{  active_menu(['pendaftaran/*','pendaftaran','ikan/*','ikan']) }}">
                                <i class="fas fa-fw fa-edit  fa-fw"></i>
                                <p>
                                    Pendaftaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if(userCan('daftar.create'))
                                <li class="nav-item ">
                                    <a href="{{ url('/pendaftaran/create') }}" class="nav-link {{  active_menu(['pendaftaran/create']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Pendaftaran</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('daftar.list'))
                                <li class="nav-item ">
                                    <a href="{{ url('/pendaftaran') }}" class="nav-link {{  active_menu(['pendaftaran']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Terdaftar</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('ikan.index'))
                                <li class="nav-item ">
                                    <a href="{{ url('/ikan') }}" class="nav-link {{  active_menu(['ikan','ikan/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Ikan</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{  open_menu(['tagihan/*','tagihan']) }}">
                            <a href="#" class="nav-link  {{  active_menu(['tagihan/*','tagihan']) }}">
                                <!-- <i class="fas money-bill-alt  fa-fw"></i> -->
                                <i class="fas fa-money-check-alt fa-fw"></i>
                                <p>
                                    Pembayaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if(userCan('tagihan.list'))
                                <li class="nav-item ">
                                    <a href="{{ url('/tagihan') }}" class="nav-link {{  active_menu(['tagihan']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tagihan</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('tagihan.payletter'))
                                <li class="nav-item ">
                                    <a href="{{ url('tagihan/payletter') }}" class="nav-link {{  active_menu(['tagihan/payletter']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pay Letter</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('tagihan.lunas'))
                                <li class="nav-item ">
                                    <a href="{{ url('tagihan/lunas') }}" class="nav-link {{  active_menu(['tagihan/lunas']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lunas</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('tagihan.surplus.defisit'))
                                <li class="nav-item ">
                                    <a href="{{ url('tagihan/surplusdefisit') }}" class="nav-link {{  active_menu(['tagihan/surplusdefisit']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Surplus / Defisit</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(userCan('jenisikan.list')||userCan('biaya.list')||userCan('event')||userCan('point.list'))
                        <li class="nav-header">EVENT</li>
                        <li class="nav-item has-treeview {{  open_menu(['event','event/*','jenisikan','jenisikan/*','biaya','biaya/*','poin','poin/*']) }}">
                            <a href="#" class="nav-link  {{  active_menu(['event','event/*','jenisikan','jenisikan/*','biaya','biaya/*','poin','poin/*']) }}">
                                <i class="fab fa-artstation  fa-fw"></i>
                                <p>
                                    Data Pendukung
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if(userCan('event'))
                                <li class="nav-item ">
                                    <a href="{{ url('/event') }}" class="nav-link {{  active_menu(['event','event/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Poster</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('jenisikan.list'))
                                <li class="nav-item">
                                    <a href="{{ url('/jenisikan') }}" class="nav-link {{  active_menu(['jenisikan','jenisikan/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Ikan</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('biaya.list'))
                                <li class="nav-item">
                                    <a href="{{ url('/biaya') }}" class="nav-link {{  active_menu(['biaya','biaya/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biaya</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('poin.list'))
                                <li class="nav-item">
                                    <a href="{{ url('/poin') }}" class="nav-link {{  active_menu(['poin','poin/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Poin</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(userCan('user.list')||userCan('role.list')||userCan('permissions.list'))
                        <li class="nav-header">KONFIGURASI</li>
                        <li class="nav-item has-treeview  {{  open_menu(['account','account/*','permission','role','permission/*','role/*']) }}">
                            <a href="#" class="nav-link {{  active_menu(['account','account/*','permission','role','permission/*','role/*']) }} ">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Sistem
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if(userCan('user.list'))
                                <li class="nav-item">
                                    <a href="{{ url('/account') }}" class="nav-link {{ active_menu(['account','account/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('role.list'))
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link {{ active_menu(['role','role/*']) }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                                @endif
                                @if(userCan('permissions.list'))
                                <li class="nav-item">
                                    <!-- Request::is('permission','permission/*') ? 'active' : '' -->
                                    <a href="{{ route('permission.index') }}" class="nav-link {{ active_menu(['permission','permission/*'])  }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer d-print-none">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <div id="flashdata" data-pesan="{{ session('status') }}"> </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
            dropdownAutoWidth: true,
            width: 'auto'
        });

        var flashdata = $('#flashdata').data('pesan');
        
        if (flashdata) {
            Swal.fire({
                text: flashdata,
                type: $('#flashdata').data('type')??'success',
                timer: 3000,
                showConfirmButton: false
            });
        }

        

        // hapus data 
        $('#table').on('click', '.hapus', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikanya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = $(this).data('url');
                }
            })

        });

        //Basic
        $('#sa-basic').click(function() {
            Swal.fire("alert sweet alert");
            // alert('asdasfasf');
        });
    </script>
    @yield('script')
</body>

</html>