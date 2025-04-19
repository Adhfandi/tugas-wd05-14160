@extends('layout.pagemain')
@section('title', 'Dokter Obat Page')

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                   with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href={{ url('/dokter') }} class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dokter
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/dokter/periksa') }} class="nav-link">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href={{ url('dokter/obat') }} class="nav-link active">
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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Periksa</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaObat">Nama Obat</label>
                                    <input type="text" class="form-control" id="namaObat" placeholder="Input obat's name">
                                </div>
                                <div class="form-group">
                                    <label for="kemasan">Kemasan</label>
                                    <input type="text" class="form-control" id="kemasan" placeholder="Input kemasan's name">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" placeholder="Input the price">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah Obat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Obat</h3>
                            <div class="card-tools">
                                <input type="text" class="form-control float-right" placeholder="Search">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>B001</td>
                                        <td>Paracetamol</td>
                                        <td>Dus</td>
                                        <td>20000</td>
                                        <td>
                                            <button class="btn btn-warning">Edit</button>
                                            <button class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>B002</td>
                                        <td>Obat Tidur</td>
                                        <td>Pil</td>
                                        <td>10000</td>
                                        <td>
                                            <button class="btn btn-warning">Edit</button>
                                            <button class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>B003</td>
                                        <td>Actived</td>
                                        <td>Sirup</td>
                                        <td>50000</td>
                                        <td>
                                            <button class="btn btn-warning">Edit</button>
                                            <button class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection