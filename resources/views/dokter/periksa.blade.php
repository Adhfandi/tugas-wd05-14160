@extends('layout.pagemain')
@section('title', 'Dokter Periksa Page')

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                                           with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ url('/dokter') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dokter
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ url('/dokter/periksa') }}" class="nav-link active">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/dokter/obat') }}" class="nav-link ">
                    <p>
                        Obat
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dokter</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Periksa</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Periksa</th>
                                    <th>Pasien</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Catatan</th>
                                    <th>Biaya Periksa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Iqbal</td>
                                    <td>2025-03-24 04:08:47</td>
                                    <td>Pasien mengalami demam tinggi dan batuk.</td>
                                    <td>150000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Iqbal</td>
                                    <td>2025-03-27 04:08:47</td>
                                    <td>Pasien mengalami sakit kepala dan pusing.</td>
                                    <td>200000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection