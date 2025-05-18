<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Register - desa</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Empire, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="{{asset('be/img/favicon.ico')}}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('be/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('be/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('be/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('be/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{asset('be/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('be/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset('be/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{asset('be/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{asset('be/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{asset('be/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('be/css/pages/authentication.css')}}">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="ui-w-60">
                    <div class="w-100 position-relative">
                        <img src="{{asset('be/img/logo.png')}}" alt="Brand Logo" class="img-fluid">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->
            @if ($errors->any())
            <div class="alert alert-danger text-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- [ Form ] Start -->
            <form action="{{ route('register-pelanggan') }}" method="POST" enctype="multipart/form-data" class="mt-5">
                  @csrf
                <div class="form-group">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="nama_lengkap" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="email">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="no_hp" class="form-label">No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="mb-3">
                      <label for="foto" class="form-label">Foto</label>
                      <input class="form-control" type="file" name="foto" id="foto" accept="image/*">
                  </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                Already have an account?
                <a href="login-pelanggan">Log In</a>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="{{asset('be/js/pace.js')}}"></script>
    <script src="{{asset('be/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('be/libs/popper/popper.js')}}"></script>
    <script src="{{asset('be/js/bootstrap.js')}}"></script>
    <script src="{{asset('be/js/sidenav.js')}}"></script>
    <script src="{{asset('be/js/layout-helpers.js')}}"></script>
    <script src="{{asset('be/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{asset('be/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <!-- Demo -->
    <script src="{{asset('be/js/demo.js')}}"></script>
    <script src="{{asset('be/js/analytics.js')}}"></script>
</body>

</html>
