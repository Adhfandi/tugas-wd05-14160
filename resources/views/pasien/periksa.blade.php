@extends('layout.main')
<<<<<<< HEAD
@section('title', 'Daftar Poli')

@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Poli</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Poli</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Pendaftaran -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Poli</h3>
                        </div>
                        <form action="{{ route('pasien.periksa.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="no_rm">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" id="no_rm" value="{{ auth()->user()->pasien->no_rm ?? '' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="poli">Pilih Poli</label>
                                    <select class="form-control @error('poli_id') is-invalid @enderror" id="poli" name="poli_id" required>
                                        <option value="">Pilih Poli</option>
                                        @foreach($polis as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>
                                    @error('poli_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jadwal">Pilih Jadwal</label>
                                    <select class="form-control @error('jadwal_id') is-invalid @enderror" id="jadwal" name="jadwal_id" required>
                                        <option value="">Pilih Jadwal</option>
                                    </select>
                                    @error('jadwal_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" rows="3" required>{{ old('keluhan') }}</textarea>
                                    @error('keluhan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Riwayat Daftar Poli -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Daftar Poli</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Hari</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($riwayat as $index => $daftar)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $daftar->poli->nama_poli }}</td>
                                                <td>{{ $daftar->jadwal->dokter->user->name }}</td>
                                                <td>{{ $daftar->jadwal->hari }}</td>
                                                <td>{{ $daftar->jadwal->jam_mulai }}</td>
                                                <td>{{ $daftar->jadwal->jam_selesai }}</td>
                                                <td>{{ $daftar->status }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
=======
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
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#poli').on('change', function() {
        var poliId = $(this).val();
        if(poliId) {
            $.ajax({
                url: '/pasien/get-jadwal/' + poliId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log('Data yang diterima:', data);
                    $('#jadwal').empty();
                    $('#jadwal').append('<option value="">Pilih Jadwal</option>');
                    
                    if(data && data.length > 0) {
                        data.forEach(function(jadwal) {
                            $('#jadwal').append(
                                '<option value="' + jadwal.id + '">' +
                                jadwal.dokter.name + ' - ' +
                                jadwal.hari + ' (' +
                                jadwal.jam_mulai + ' - ' +
                                jadwal.jam_selesai + ')</option>'
                            );
                        });
                    } else {
                        $('#jadwal').append('<option value="" disabled>Tidak ada jadwal tersedia</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil jadwal');
                }
            });
        } else {
            $('#jadwal').empty();
            $('#jadwal').append('<option value="">Pilih Jadwal</option>');
        }
    });
});
</script>
@endpush
=======
        </section>
    </div>
@endsection
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
