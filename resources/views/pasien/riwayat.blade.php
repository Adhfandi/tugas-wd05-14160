@extends('layout.pagemain')
@section('title', 'Pasien Riwayat Page')

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                     with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href={{ url('/pasien') }} class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/pasien/periksa') }} class="nav-link ">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href={{ url('/pasien/riwayat') }} class="nav-link active">
                    <p>
                        Riwayat
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
@section('isi')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1>Pasien</h1>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Periksa</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Periksa</th>
                                        <th>Dokter</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Catatan</th>
                                        <th>Obat</th>
                                        <th>Biaya Periksa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>P001</td>
                                        <td>Andi</td>
                                        <td>24-03-2025</td>
                                        <td>Perlu banyak tidur</td>
                                        <td>Obat tidur</td>
                                        <td>170000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>P002</td>
                                        <td>Andi</td>
                                        <td>26-03-2025</td>
                                        <td>Perlu banyak olahraga</td>
                                        <td>Ashwagandha</td>
                                        <td>200000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection