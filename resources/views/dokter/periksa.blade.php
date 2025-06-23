<<<<<<< HEAD
@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dokter</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.col -->

            <!-- /.row -->
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
                        <!-- /.card-header -->
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
                                    @foreach ($periksas as $periksa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $periksa->id }}</td>
                                            <td>{{ $periksa->pasien->nama }}</td>
                                            <td>{{ $periksa->tgl_periksa }}</td>
                                            <td>{{ $periksa->catatan }}</td>
                                            <td>{{ $periksa->biaya_periksa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
=======
@extends('components.layout')

@section('nav-content')
    <ul class="nav">
        <li class="nav-item"><a href="{{ route('dokter.dashboard') }}" class="nav-link"><i
                    class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('dokter.obat') }}" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                Obat</a></li>
        <li class="nav-item"><a href="{{ route('dokter.periksa') }}" class="nav-link"><i
                    class="nav-icon fas fa-book"></i> Periksa</a></li>
    </ul>
@endsection

@section('content')
    <h1 class="display-4 text-primary">Daftar Pemeriksaan {{ Auth::user()->name }}</h1>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>KODE PERIKSA</th>
            <th>Nama Pasien</th>
            <th>Tanggal Periksa</th>
            <th>Catatan</th>
            <th>Obat</th>
            <th>Biaya Periksa</th>
            <th>Detail Biaya</th>
            <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
        </tr>
        </thead>
        <tbody>
        @foreach($periksas as $periksa)
            <tr>
                <td>PR{{ $periksa->id }}</td>
                <td>{{ $periksa->pasien->name ?? 'Tidak Diketahui' }}</td>
                <td>{{ $periksa->tgl_periksa }}</td>
                <td>{{ $periksa->catatan }}</td>
                <td>
                    @foreach($periksa->obat as $obat)
                        {{ $obat->nama_obat }} <br>
                    @endforeach
                </td>
                <td>Rp. {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#detailModal{{ $periksa->id }}">
                        Lihat Detail
                    </button>

                    <!-- Modal Detail Biaya -->
                    <div class="modal fade" id="detailModal{{ $periksa->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="detailModalLabel{{ $periksa->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $periksa->id }}">Detail Biaya -
                                        PR{{ $periksa->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        @php
                                            $totalObat = 0;
                                            foreach($periksa->obat as $obat) {
                                                $totalObat += $obat->harga;
                                            }
                                            $biayaKonsultasi = $periksa->biaya_periksa - $totalObat;
                                        @endphp
                                        <tr>
                                            <th>Biaya Konsultasi</th>
                                            <td>Rp. {{ number_format($biayaKonsultasi, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Biaya Obat</th>
                                            <td>
                                                @foreach($periksa->obat as $obat)
                                                    {{ $obat->nama_obat }} ({{ $obat->kemasan }}) -
                                                    Rp. {{ number_format($obat->harga, 0, ',', '.') }}<br>
                                                @endforeach
                                                <hr>
                                                <strong>Total Obat:
                                                    Rp. {{ number_format($totalObat, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="bg-light">
                                            <th>Total Biaya</th>
                                            <td>
                                                <strong>Rp. {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('dokter.editPeriksa', $periksa->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('dokter.deletePeriksa', $periksa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this examination?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
@endsection
