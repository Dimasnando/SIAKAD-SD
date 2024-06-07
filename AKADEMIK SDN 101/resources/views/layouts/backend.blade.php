<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SDN 101 &mdash; Lambur 1</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('update/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('update/modules/fontawesome/css/all.min.css') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('update/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('update/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('update/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ url('update/modules/summernote/summernote-bs4.css') }}">

    <!-- CSS datatabel -->
    <link rel="stylesheet" href="{{ asset('update') }}/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="{{ asset('update') }}/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('update') }}/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('update/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('update/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <i class="fas fa-user fa-fw"></i>{{ Auth::user()->name }}
                    @if (auth()->user()->role == 'Guru')
                        {{ Auth::user()->pegawai->nama }}
                    @endif
                    @if (auth()->user()->role == 'Siswa')
                        {{ Auth::user()->siswa->nama }}
                    @endif
                </a>

                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a href="{{ url('profil', []) }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profil
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">

                    {{-- super admin --}}
                    @if (auth()->user()->role == 'Dev')
                        <div class="main-sidebar sidebar-style-2">
                            <aside id="sidebar-wrapper">
                                <div class="sidebar-brand">
                                    <a href="">SDN 101 LAMBUR 1</a>
                                </div>
                                <div class="sidebar-brand sidebar-brand-sm">
                                    <a href="">SD101</a>
                                </div>
                                <ul class="sidebar-menu">
                                    <li class="menu-header">Dashboard</li>
                                    <li class="@if (Request::segment(1) == 'home') dropdown active @endif">
                                        <a href="{{ url('home', []) }}" class="nav-link"><i
                                                class="fas fa-fire"></i><span>Dashboard</span></a>
                                    </li>
                                    {{-- <li class="@if (Request::segment(1) == 'profil') dropdown active @endif">
                                        <a href="{{ url('profil', []) }}" class="nav-link"><i class="far fa-user"></i>
                                            <span>Profil</span></a>
                                    </li> --}}
                                    <li class="menu-header">Data Siakad</li>
                                    <li class="@if (Request::segment(1) == 'jadwal') dropdown active @endif"><a
                                            class="nav-link" href="{{ url('jadwal', []) }}"><i class="fas fa-book"></i>
                                            <span>Jadwal</span></a></li>
                                    <li class="menu-header">Data Master</li>
                                    <li class="@if (Request::segment(1) == 'pegawai') dropdown active @endif">
                                        <a href="{{ url('pegawai', []) }}"><i class="fas fa-user-circle  "></i>
                                            <span>Guru</span></a>

                                    </li>
                                    <li class="@if (Request::segment(1) == 'siswa') dropdown active @endif">
                                        <a href="{{ url('siswa', []) }}"><i class="fas fa-user-circle  "></i>
                                            <span>Siswa</span></a>
                                    </li>
                                    <li class="@if (Request::segment(1) == 'kelas') dropdown active @endif">
                                        <a href="{{ url('kelas', []) }}"><i class="fas fa-university"></i>
                                            <span>Kelas</span></a>
                                    </li>
                                    <li class="@if (Request::segment(1) == 'mapel') dropdown active @endif">
                                        <a href="{{ url('mapel', []) }}"><i class="fas fa-book"></i>
                                            <span>Mapel</span></a>
                                    </li>
                                    <li class="@if (Request::segment(1) == 'tahun') dropdown active @endif">
                                        <a href="{{ url('tahun', []) }}"><i class="fas fa-book"></i>
                                            <span>Tahun Ajaran</span></a>
                                    </li>
                                    <li class="menu-header">Publikasi</li>
                                    <li class="@if (Request::segment(1) == 'informasi') dropdown active @endif">
                                        <a href="{{ url('informasi', []) }}"><i class="fas fa-image"></i>
                                            <span>Informasi</span></a>
                                    </li>
                                    <li class="menu-header">Data Akun</li>
                                    <li class="dropdown">
                                        <a href="#" class="nav-link has-dropdown"><i
                                                class="fas fa-key"></i><span>User</span></a>
                                        <ul class="dropdown-menu">
                                            <li class="@if (Request::segment(1) == 'user/guru') dropdown active @endif">
                                                <a href="{{ url('user/guru', []) }}"><i class="fas fa-minus"></i>
                                                    <span>Guru</span></a>
                                            <li class="@if (Request::segment(1) == 'user/siswa') dropdown active @endif">
                                                <a href="{{ url('user/siswa', []) }}"><i class="fas fa-minus"></i>
                                                    <span>Siswa</span></a>
                                        </ul>
                                    </li>
                                    {{-- <li class="menu-header">Laporan</li>
                                    <li class="@if (Request::segment(1) == 'laporans') dropdown active @endif">
                                        <a href="{{ url('laporans', []) }}"><i class="fas fa-user"></i>
                                            <span>Laporan</span></a>
                                    </li> --}}
                                </ul>
                                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                    <a href="" data-toggle="modal" data-target="#logoutModal"
                                        class="btn btn-primary btn-lg btn-block btn-icon-split">
                                        <i class="fas fa-rocket"></i> Logout
                                    </a>
                                </div>
                            </aside>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'Guru')
                        <div class="main-sidebar sidebar-style-2">
                            <aside id="sidebar-wrapper">
                                <div class="sidebar-brand">
                                    <a href="">SDN 101 LAMBUR 1</a>
                                </div>
                                <div class="sidebar-brand sidebar-brand-sm">
                                    <a href="">SD101</a>
                                </div>
                                <ul class="sidebar-menu">
                                    <li class="menu-header">Dashboard</li>
                                    <li class="@if (Request::segment(1) == 'home') dropdown active @endif">
                                        <a href="{{ url('home', []) }}" class="nav-link"><i
                                                class="fas fa-fire"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="menu-header">Data Master</li>
                                    <li class="@if (Request::segment(1) == 'jadwal') dropdown active @endif">
                                        <a class="nav-link" href="{{ url('jadwal', []) }}">
                                            <i class="fas fa-book"></i> <span>Jadwal</span>
                                        </a>
                                    </li>
                                    <li class="@if (Request::segment(1) == 'nilai') dropdown active @endif">
                                        <a class="nav-link" href="{{ url('nilai', []) }}">
                                            <i class="fas fa-percent"></i> <span>Nilai</span>
                                        </a>
                                    </li>
                                    <li class="menu-header">Siswa Saya</li>
                                    <li class="@if (Request::segment(1) == 'siswa-saya') dropdown active @endif">
                                        <a href="{{ url('siswa-saya', []) }}" class="nav-link"><i
                                                class="fas fa-users"></i><span>Siswa</span></a>
                                    </li>
                                </ul>
                                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                    <a href="" data-toggle="modal" data-target="#logoutModal"
                                        class="btn btn-primary btn-lg btn-block btn-icon-split">
                                        <i class="fas fa-rocket"></i> Logout
                                    </a>
                                </div>
                            </aside>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'Siswa')
                        <div class="main-sidebar sidebar-style-2">
                            <aside id="sidebar-wrapper">
                                <div class="sidebar-brand">
                                    <a href="">SDN 101 LAMBUR 1</a>
                                </div>
                                <div class="sidebar-brand sidebar-brand-sm">
                                    <a href="">SD101</a>
                                </div>
                                <ul class="sidebar-menu">
                                    <li class="menu-header">Dashboard</li>
                                    <li class="@if (Request::segment(1) == 'home') dropdown active @endif">
                                        <a href="{{ url('home', []) }}" class="nav-link"><i
                                                class="fas fa-fire"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="menu-header">Data Master</li>
                                    <li class="@if (Request::segment(1) == 'jadwal') dropdown active @endif">
                                        <a class="nav-link" href="{{ url('jadwal', []) }}">
                                            <i class="fas fa-book"></i> <span>Jadwal</span>
                                        </a>
                                    </li>
                                    <li class="@if (Request::segment(1) == 'nilai/saya') dropdown active @endif">
                                        <a class="nav-link" href="{{ url('nilai/saya', []) }}">
                                            <i class="fas fa-percent"></i> <span>Nilai</span>
                                        </a>

                                    </li>
                                </ul>
                                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                    <a href="" data-toggle="modal" data-target="#logoutModal"
                                        class="btn btn-primary btn-lg btn-block btn-icon-split">
                                        <i class="fas fa-rocket"></i> Logout
                                    </a>
                                </div>
                            </aside>
                        </div>
                    @endif
                    <div id="layoutSidenav_content">
                        @yield('content')
                        <footer class="main-footer">
                            <div class="footer-left">
                                &copy; 2023 SDN 101 LAMBUR 1
                        </footer>
                    </div>
                </div>
                @yield('grafik')
            </nav>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" Jika ingin keluar Aplikasi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-sm btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Logout --}}

    <!-- General JS Scripts -->
    <script src="{{ asset('update') }}/modules/jquery.min.js"></script>
    <script src="{{ asset('update') }}/modules/popper.js"></script>
    <script src="{{ asset('update') }}/modules/tooltip.js"></script>
    <script src="{{ asset('update') }}/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('update') }}/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('update') }}/modules/moment.min.js"></script>
    <script src="{{ asset('update') }}/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('update') }}/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('update') }}/modules/chart.min.js"></script>
    <script src="{{ asset('update') }}/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{ asset('update') }}/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{ asset('update') }}/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('update') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('update') }}/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('update') }}/js/scripts.js"></script>
    <script src="{{ asset('update') }}/js/custom.js"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('update') }}/modules/datatables/datatables.min.js"></script>
    <script src="{{ asset('update') }}/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('update') }}/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ asset('update') }}/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('update') }}/js/page/modules-datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    @stack('jss')
</body>

</html>
