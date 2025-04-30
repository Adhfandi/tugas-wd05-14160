@extends('layout.main')
@section('title', 'Pasien Periksa Page')

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
                            <li class="breadcrumb-item active">Pendaftaran Periksa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Form Pendaftaran Periksa -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Pendaftaran Periksa</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pasien.periksa.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="dokter_id">Pilih Dokter:</label>
                                        <select name="dokter_id" id="dokter_id" class="form-control">
                                            @foreach($dokters as $dokter)
                                                <option value="{{ $dokter->id }}" {{ request('dokter_id') == $dokter->id ? 'selected' : '' }}>
                                                    {{ $dokter->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Daftar Periksa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Riwayat Periksa -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Riwayat Periksa</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-light">
                                                <th width="5%">NO</th>
                                                <th width="10%">ID Periksa</th>
                                                <th width="15%">Dokter</th>
                                                <th width="15%">Tanggal Periksa</th>
                                                <th width="15%">Catatan</th>
                                                <th width="15%">Obat</th>
                                                <th width="10%">Biaya Periksa</th>
                                                <th width="10%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($periksas as $periksa)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $periksa->id }}</td>
                                                    <td>{{ $periksa->dokter->nama }}</td>
                                                    <td>{{ $periksa->tgl_periksa ? \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y'):'-'}}</td>
                                                    <td>{{ $periksa->catatan ?? '-' }}</td>
                                                    <td>
                                                        @if(count($periksa->detailPeriksa) > 0)
                                                            <ul class="pl-3 mb-0">
                                                                @foreach ($periksa->detailPeriksa as $detail)
                                                                    <li>{{ $detail->obat->nama_obat }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $periksa->biaya_periksa ? 'Rp ' . number_format($periksa->biaya_periksa, 0, ',', '.') : '-' }}</td>
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
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada data periksa</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection