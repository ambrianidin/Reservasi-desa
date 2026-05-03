<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">
<head>
    <title>Register - desa</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ asset('be/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('be/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('be/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('be/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('be/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('be/fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('be/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('be/css/bootstrap-material.css') }}">
    <link rel="stylesheet" href="{{ asset('be/css/shreerang-material.css') }}">
    <link rel="stylesheet" href="{{ asset('be/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('be/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('be/css/pages/authentication.css') }}">

    <style>

        /* Logo */
        .reg-logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 1.75rem;
        }

        .reg-logo-wrap img {
            height: 52px;
            width: auto;
        }

        /* Heading */
        .reg-heading {
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .reg-heading h5 {
            font-size: 20px;
            font-weight: 500;
            color: #1a1a2e;
            margin: 0 0 4px;
        }

        .reg-heading p {
            font-size: 13px;
            color: #888;
            margin: 0;
        }

        /* Alert */
        .alert.alert-danger {
            border-radius: 10px;
            font-size: 13px;
            padding: 12px 16px;
            margin-bottom: 1.25rem;
        }

        /* 2-column row */
        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        /* Fields */
        .form-group {
            margin-bottom: 1.1rem;
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

        /* File input custom */
        .file-upload-wrap {
            border: 1px dashed #dde1e7;
            border-radius: 8px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: border-color 0.15s;
        }

        .file-upload-wrap:hover {
            border-color: #1976D2;
        }

        .file-upload-wrap i {
            color: #888;
            font-size: 16px;
        }

        .file-upload-wrap span {
            font-size: 13px;
            color: #888;
        }

        .file-upload-wrap input[type="file"] {
            display: none;
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

        /* Footer */
        .reg-footer-text {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin-top: 1.25rem;
        }

        .reg-footer-text a {
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .form-row-2 { grid-template-columns: 1fr; }
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
            <div class="reg-logo-wrap">
                <img src="{{ asset('be/img/logo.png') }}" alt="Brand Logo" class="img-fluid">
            </div>

            <div class="reg-heading">
                <h5>Create an account</h5>
                <p>Fill in your details to get started</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0 pl-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('register-pelanggan') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Row 2 kolom: Nama & No HP --}}
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                               class="form-control" value="{{ old('nama_lengkap') }}"
                               placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="no_hp" class="form-label">No Handphone</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                               class="form-control" placeholder="08xx xxxx xxxx">
                    </div>
                </div>
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email"
                            class="form-control" value="{{ old('email') }}"
                            placeholder="you@example.com">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control" value="{{ old('password') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                           class="form-control" value="{{ old('alamat') }}" placeholder="Jl. Banda Neira No. 1">
                </div>

                {{-- File upload custom --}}
                <div class="form-group">
                    <label class="form-label">Foto</label>
                    <label for="foto" class="file-upload-wrap">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span id="file-label">Pilih foto profil...</span>
                        <input type="file" name="foto" id="foto" accept="image/*">
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            {{-- Login link --}}
            <div class="reg-footer-text">
                Already have an account? <a href="login-pelanggan">Log In</a>
            </div>

        </div>
    </div>

    <script src="{{ asset('be/js/pace.js') }}"></script>
    <script src="{{ asset('be/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('be/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('be/js/bootstrap.js') }}"></script>
    <script src="{{ asset('be/js/sidenav.js') }}"></script>
    <script src="{{ asset('be/js/layout-helpers.js') }}"></script>
    <script src="{{ asset('be/js/material-ripple.js') }}"></script>
    <script src="{{ asset('be/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('be/js/demo.js') }}"></script>
    <script src="{{ asset('be/js/analytics.js') }}"></script>

    <script>
        {{-- Update label nama file saat dipilih --}}
        document.getElementById('foto').addEventListener('change', function () {
            const label = document.getElementById('file-label');
            label.textContent = this.files.length ? this.files[0].name : 'Pilih foto profil...';
        });
    </script>
</body>
</html>