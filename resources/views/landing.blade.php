<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang - Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Health Theme -->
    <link rel="stylesheet" href="{{ asset('dist/css/health-theme.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">
                <i class="fas fa-hospital-alt mr-2"></i>
                <span class="brand-text font-weight-light"><b>Poli</b>klinik</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <!-- Hero Section -->
                <div class="row py-5">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div>
                            <h1 class="display-4 text-primary mb-4">
                                <i class="fas fa-heartbeat mr-3"></i>
                                Selamat Datang di Poliklinik
                            </h1>
                            <p class="lead mb-4">
                                Sistem informasi terpadu untuk pelayanan kesehatan yang lebih baik.
                                Daftar sekarang dan dapatkan kemudahan dalam mengakses layanan kesehatan.
                            </p>
                            <div class="d-flex">
                                <a href="{{ route('register') }}" class="btn btn-primary btn-lg mr-3">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Daftar Sekarang
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('img/hospital.jpg') }}" alt="Health Illustration" class="img-fluid rounded-lg">
                    </div>
                </div>

                <!-- Features Section -->
                <div class="row py-5">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Dokter Profesional</h5>
                                <p class="card-text">
                                    Ditangani oleh dokter-dokter profesional yang berpengalaman di bidangnya.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Pendaftaran Online</h5>
                                <p class="card-text">
                                    Daftar periksa secara online tanpa perlu mengantri di lokasi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-history fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Riwayat Medis</h5>
                                <p class="card-text">
                                    Akses riwayat pemeriksaan medis Anda dengan mudah dan aman.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <strong>Copyright &copy; {{ date('Y') }} <a href="#" class="text-primary">Poliklinik</a>.</strong>
                    All rights reserved.
                </div>
                <div class="col-md-6 text-right">
                    <b>Version</b> 1.0.0
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
