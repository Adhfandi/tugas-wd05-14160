@extends('layout.main')
@section('title', 'Dokter Periksa Page')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pasien</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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
@endsection