<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>@yield('title', 'Default Title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Empire, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="{{asset ('be/img/favicon.png') }}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset ('be/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset ('be/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{asset ('be/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{asset ('be/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{asset ('be/fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{asset ('be/fonts/feather.css') }}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset ('be/css/bootstrap-material.css') }}">
    <link rel="stylesheet" href="{{asset ('be/css/shreerang-material.css') }}">
    <link rel="stylesheet" href="{{asset ('be/css/uikit.css') }}">


    <!-- Libs -->
    <link rel="stylesheet" href="{{asset ('be/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{asset ('be/libs/flot/flot.css') }}">
    <style>
    .sidenav-item.active > .sidenav-link {
        background-color: rgba(0,0,0,.03); 
        color: #26b4ff;
        font-weight: 500;
    }

    .sidenav-item.active > .sidenav-link i {
        color: #26b4ff;
    }

    .sidenav-link:hover {
        background-color: rgba(0,0,0,.02);
        text-decoration: none;
    }
</style>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <div class="app-brand demo">zz
                    <span class="app-brand-logo de">
                        <img src="{{asset ('be/img/logo.png') }}" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="" class="app-brand-text demo sidenav-text ml-2 font-weight-bold">Banda Neira</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="feather icon-align-left align-middle"></i>
                    </a>
                </div>
            @auth
                    @php
                        $user = Auth::user();
                        $role = $user->level ?? ($user->karyawan->jabatan ?? 'unknown');
                        $jumlahReservasiBaru = \App\Models\Reservation::where('status_reservasi_wisata','confirm')->count();
                    @endphp

                @if($role === 'admin')
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">
                    <!-- Dashboards -->
                    <li class="sidenav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{ route('admin') }}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                        </a>
                    </li>
                    <li class="sidenav-divider mb-1"></li>
                    <div class="sidenav-header small font-weight-semibold">Management</div>
                    <li class="sidenav-item {{ Request::is('userM') || Request::is('userM/create') || Request::is('userM/*') ? 'active' : '' }}">
                        <a href="{{route('userM')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-users"></i>
                            <div>User Management</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('newsM') || Request::is('newsM/create') || Request::is('newsM/*') ? 'active' : '' }}">
                        <a href="{{route('newsM')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-file-text"></i>
                            <div>News Management</div>
                        </a>
                    </li>
                    <li class="sidenav-divider mb-1"></li>
                    <div class="sidenav-header small font-weight-semibold">Services</div>
                    <li class="sidenav-item {{ Request::is('obyek-wisata') || Request::is('obyek-wisata/create') || Request::is('obyek-wisata/*') ? 'active' : '' }}">
                        <a href="{{route('obyek-wisata')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Obyek Wisata</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('paketwisata') || Request::is('paketwisata/create') || Request::is('paketwisata/*') ? 'active' : '' }}">
                        <a href="{{route('paketWisata')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-map"></i>
                            <div>Paket Wisata</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('homestay') ? 'active' : '' }}">
                        <a href="{{route('homestay')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-briefcase"></i>
                            <div>Homestay</div>
                        </a>
                    </li>
                </ul>
            </div>
            @elseif($role === 'pemilik')
            <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">
                    <!-- Dashboards -->
                    <li class="sidenav-item {{ Request::is('pemilik') ? 'active' : '' }}">
                        <a href="#" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                            <div class="pl-1 ml-auto">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            @elseif($role === 'bendahara')
            <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">
                    <!-- Dashboards -->
                    <li class="sidenav-item {{ Request::is('bendahara') ? 'active' : '' }}">
                        <a href="bendahara" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                        </a>
                    </li>
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-item {{ Request::is('diskon') || Request::is('diskon/create') || Request::is('diskon/*') ? 'active' : '' }}">
                        <a href="{{route('diskonM')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-award"></i>
                            <div>Diskon</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('reservation-confirm') || Request::is('reservation-confirm/*') ? 'active' : '' }}">
                        <a href="{{route('confirmreserv')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-folder"></i>
                            <div>Reservation 
                                @if($jumlahReservasiBaru > 0)
                                    <span class="badge badge-danger ml-2">
                                        {{ $jumlahReservasiBaru }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('jenis-pembayaran') || Request::is('jenis-pembayaran/*') ? 'active' : '' }}">
                        <a href="{{route('jenisPembayaran')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-credit-card"></i>
                            <div>Jenis Pembayaran</div>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
        @endauth
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x fixed-top" id="layout-navbar">
                    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="{{asset ('be/img/logo-dark.png') }}" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">Banda Neira</span>
                    </a>
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">


                        <div class="navbar-nav align-items-lg-center ml-auto">
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{Auth::user()->level}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('logoutK')}}" class="dropdown-item">
                                        <i class="feather icon-log-out text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- [ Layout content ] Start -->
                </div>
                <!-- [ Layout container ] End -->
            </div>
            <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->
    <!-- Core scripts -->
    <script src="{{asset ('be/js/pace.js') }}"></script>
    <script src="{{asset ('be/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset ('be/libs/popper/popper.js') }}"></script>
    <script src="{{asset ('be/js/bootstrap.js') }}"></script>
    <script src="{{asset ('be/js/sidenav.js') }}"></script>
    <script src="{{asset ('be/js/layout-helpers.js') }}"></script>
    <script src="{{asset ('be/js/material-ripple.js') }}"></script>
    @stack('scripts')
    <!-- Libs -->
    <script src="{{asset ('be/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{asset ('be/libs/eve/eve.js') }}"></script>
    <script src="{{asset ('be/libs/flot/flot.js') }}"></script>
    <script src="{{asset ('be/libs/flot/curvedLines.js') }}"></script>
    <script src="{{asset ('be/libs/chart-am4/core.js') }}"></script>
    <script src="{{asset ('be/libs/chart-am4/charts.js') }}"></script>
    <script src="{{asset ('be/libs/chart-am4/animated.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    
    <!-- Demo -->
    <script src="{{asset ('be/js/demo.js') }}"></script>
    <script src="{{asset ('be/js/analytics.js') }}"></script>
    <script src="{{asset ('be/js/pages/dashboards_index.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidenavToggle = document.querySelector('.layout-sidenav-toggle');
            const layoutWrapper = document.querySelector('.layout-wrapper');

            if (sidenavToggle && layoutWrapper) {
                sidenavToggle.addEventListener('click', function () {
                    layoutWrapper.classList.toggle('layout-sidenav-collapsed');
                });
            }
        });
    </script>
    @if($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "suscess",
                text: "{{ $message }}"
            });
        </script>
    @endif
    @if($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: "errror",
                text: "{{ $message }}"
            });
        </script>
    @endif
</body>

</html>
