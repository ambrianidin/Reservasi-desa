<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="be/fonts/fontawesome.css">
    <link rel="stylesheet" href="be/fonts/ionicons.css">
    <link rel="stylesheet" href="be/fonts/linearicons.css">
    <link rel="stylesheet" href="be/fonts/open-iconic.css">
    <link rel="stylesheet" href="be/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="be/fonts/feather.css">
    <link rel="stylesheet" href="be/css/bootstrap-material.css">
    <link rel="stylesheet" href="be/css/shreerang-material.css">
    <link rel="stylesheet" href="be/css/uikit.css">
    <link rel="stylesheet" href="be/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="be/css/pages/authentication.css">

    <style>
        /* ===== Login Page Override ===== */
        .authentication-wrapper.authentication-1 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f2f5;
        }

        .authentication-inner {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 16px;
            padding: 2.5rem 2rem 2rem;
            box-shadow: 0 2px 24px rgba(0,0,0,0.08);
        }

        /* Logo */
        .login-logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 1.75rem;
        }

        .login-logo-wrap img {
            height: 52px;
            width: auto;
        }

        /* Heading */
        .login-heading {
            text-align: center;
            margin-bottom: 0.25rem;
        }

        .login-heading h5 {
            font-size: 20px;
            font-weight: 500;
            color: #1a1a2e;
            margin: 0;
        }

        .login-heading p {
            font-size: 13px;
            color: #888;
            margin: 4px 0 1.75rem;
        }

        /* Alert */
        .alert.alert-danger {
            border-radius: 10px;
            font-size: 13px;
            padding: 12px 16px;
            margin-bottom: 1.25rem;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            border-radius: 8px !important;
            border: 1px solid #dde1e7 !important;
            padding: 10px 14px !important;
            font-size: 14px !important;
            height: auto !important;
            transition: border-color 0.15s, box-shadow 0.15s !important;
        }

        .form-control:focus {
            border-color: #1976D2 !important;
            box-shadow: 0 0 0 3px rgba(25,118,210,0.12) !important;
        }

        /* Submit button */
        .btn.btn-primary.btn-block {
            margin-top: 0.5rem;
            padding: 11px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            letter-spacing: 0.02em;
        }

        /* Footer link */
        .login-footer-text {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin-top: 1.5rem;
        }

        .login-footer-text a {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner">

            {{-- Logo --}}
            <div class="login-logo-wrap">
                <img src="be/img/logo.png" alt="Brand Logo" class="img-fluid">
            </div>

            {{-- Heading --}}
            <div class="login-heading">
                <h5>Welcome back</h5>
                <p>Sign in to your account to continue</p>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">
                <ul class="mb-0 pl-3">
                        <li>{{ session('error') }}</li>
                </ul>
                
            </div>
            @endif
            {{-- Form --}}
            <form method="POST" action="{{ route('login-pelanggan') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="input password" minlength="6">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Log In</button>
            </form>

            {{-- Register Link --}}
            <div class="login-footer-text">
                Don't have an account? <a href="register-pelanggan">Register</a>
            </div>

        </div>
    </div>

    <script src="be/js/pace.js"></script>
    <script src="be/js/jquery-3.3.1.min.js"></script>
    <script src="be/libs/popper/popper.js"></script>
    <script src="be/js/bootstrap.js"></script>
    <script src="be/js/sidenav.js"></script>
    <script src="be/js/layout-helpers.js"></script>
    <script src="be/js/material-ripple.js"></script>
    <script src="be/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="be/js/demo.js"></script>
    <script src="be/js/analytics.js"></script>
</body>
</html>