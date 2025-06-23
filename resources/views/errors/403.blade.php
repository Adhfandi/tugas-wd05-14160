<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 | Akses Ditolak</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition">
    <div class="wrapper">
        <section class="content">
            <div class="error-page" style="margin-top: 100px;">
                <h2 class="headline text-warning">403</h2>
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Akses Ditolak.</h3>
                    <p>
                        {{ session('error') ?? 'Anda tidak memiliki akses ke halaman ini.' }}
                        Silakan kembali ke <a href="{{ url('/') }}">halaman utama</a>.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html> 
=======
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding: 100px;
        }

        h1 {
            font-size: 100px;
            margin-bottom: 20px;
            color: #dc3545;
        }

        h2 {
            color: #343a40;
        }

        p {
            color: #6c757d;
        }

        a {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>403</h1>
    <h2>Oops! Anda Tidak Memilki Akses.</h2>
    <p>Halaman yang kamu cari mungkin telah dipindahkan atau tidak tersedia.</p>
    <a href="/">Kembali ke Beranda</a>
</body>

</html>
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
