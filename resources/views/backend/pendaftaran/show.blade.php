@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Detail Pendaftaran</h3>
            <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $pendaftaran->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ $pendaftaran->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $pendaftaran->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $pendaftaran->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $pendaftaran->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $pendaftaran->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $pendaftaran->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $pendaftaran->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Email</th>
                        <td>{{ $pendaftaran->alamat_email }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 1</th>
                        <td>{{ $pendaftaran->jurusan_pertama }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 2</th>
                        <td>{{ $pendaftaran->jurusan_kedua }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 3</th>
                        <td>{{ $pendaftaran->jurusan_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d M Y, H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
