<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Log In</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Empire, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="be/img/favicon.png">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="be/fonts/fontawesome.css">
    <link rel="stylesheet" href="be/fonts/ionicons.css">
    <link rel="stylesheet" href="be/fonts/linearicons.css">
    <link rel="stylesheet" href="be/fonts/open-iconic.css">
    <link rel="stylesheet" href="be/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="be/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="be/css/bootstrap-material.css">
    <link rel="stylesheet" href="be/css/shreerang-material.css">
    <link rel="stylesheet" href="be/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="be/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="be/css/pages/authentication.css">
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
                        <img src="be/img/logo.png" alt="Brand Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <!-- [ Form ] Start -->
            @if($errors->any())
            <div class="alert alert-danger text-danger mt-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif  
            <form class="my-5" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}" >
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label d-flex justify-content-between align-items-end">
                        <span>Password</span>                    
                    </label>
                    <input type="password" name="password" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="d-flex justify-content-center align-items-center m-0">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Log In</button>
                </div>
            </form>
            <!-- [ Form ] End -->
            <div class="text-center text-muted">
                DOnt have an account?
                <a href="register-pelanggan">Register</a>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="be/js/pace.js"></script>
    <script src="be/js/jquery-3.3.1.min.js"></script>
    <script src="be/libs/popper/popper.js"></script>
    <script src="be/js/bootstrap.js"></script>
    <script src="be/js/sidenav.js"></script>
    <script src="be/js/layout-helpers.js"></script>
    <script src="be/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="be/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Demo -->
    <script src="be/js/demo.js"></script><script src="be/js/analytics.js"></script>
</body>

</html>
