@extends('layout.main')
<<<<<<< HEAD
@section('title', 'Dokter Periksa Page')
=======
@section('title', 'Dokter  Page')
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2

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
                            <li class="breadcrumb-item active">Daftar Periksa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Tampilkan pesan sukses jika ada -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
<<<<<<< HEAD
                
                <div class="card">
                    <div class="card-header">
=======

                <div class="card">
                    <div class="card-header bg-primary text-white">
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
                        <h3 class="card-title">Daftar Periksa Pasien</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Pasien</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
<<<<<<< HEAD
                            <tbody> 
                                @foreach ($periksas as $periksa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $periksa->pasien->nama }}</td>
                                    <td>{{ $periksa->tgl_periksa ? \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y') : 'Belum diperiksa' }}</td>
                                    <td>
                                        @if($periksa->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif($periksa->status == 'dalam proses')
                                            <span class="badge badge-warning">Dalam Proses</span>
                                        @elseif($periksa->status == 'menunggu')
                                            <span class="badge badge-info">Menunggu</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $periksa->status ?? 'Belum diproses' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('dokter.memeriksa.edit', $periksa->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-stethoscope"></i> Periksa
                                            </a>
                                            
                                            @if($periksa->status != 'selesai')
                                                <form action="{{ route('dokter.memeriksa.status', $periksa->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan pemeriksaan ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm ml-1">
                                                        <i class="fas fa-check"></i> Selesaikan
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
=======
                            <tbody>
                                @foreach ($periksas as $periksa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $periksa->pasien->nama }}</td>
                                        <td>{{ $periksa->tgl_periksa ? \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y') : 'Belum diperiksa' }}
                                        </td>
                                        <td>
                                            @if($periksa->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($periksa->status == 'dalam proses')
                                                <span class="badge badge-warning">Dalam Proses</span>
                                            @elseif($periksa->status == 'menunggu')
                                                <span class="badge badge-info">Menunggu</span>
                                            @else
                                                <span
                                                    class="badge badge-secondary">{{ $periksa->status ?? 'Belum diproses' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('dokter.memeriksa.edit', $periksa->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-stethoscope"></i> Periksa
                                                </a>

                                                @if($periksa->status != 'selesai')
                                                    <form action="{{ route('dokter.memeriksa.status', $periksa->id) }}"
                                                        method="POST" style="display:inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan pemeriksaan ini?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success btn-sm ml-1">
                                                            <i class="fas fa-check"></i> Selesaikan
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection