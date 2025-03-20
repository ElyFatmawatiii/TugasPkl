@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Edit Pendaftaran</div>
                        <a href="{{ route('pendaftaran') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">

                        {{-- Notifikasi Berhasil Edit --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                                <div class="col-md-6">
                                    <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nisn" class="col-md-4 col-form-label text-md-right">NISN</label>
                                <div class="col-md-6">
                                    <input id="nisn" type="text" class="form-control" name="nisn" value="{{ old('nisn', $pendaftaran->nisn) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>
                                <div class="col-md-6">
                                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" required>
                                        <option value="Laki-laki" {{ $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="asal_sekolah" class="col-md-4 col-form-label text-md-right">Asal Sekolah</label>
                                <div class="col-md-6">
                                    <input id="asal_sekolah" type="text" class="form-control" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nomor_hp" class="col-md-4 col-form-label text-md-right">Nomor HP</label>
                                <div class="col-md-6">
                                    <input id="nomor_hp" type="text" class="form-control" name="nomor_hp" value="{{ old('nomor_hp', $pendaftaran->nomor_hp) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">Nama Ayah</label>
                                <div class="col-md-6">
                                    <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">Nama Ibu</label>
                                <div class="col-md-6">
                                    <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="alamat_email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="alamat_email" type="email" class="form-control" name="alamat_email" value="{{ old('alamat_email', $pendaftaran->alamat_email) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="jurusan_pertama" class="col-md-4 col-form-label text-md-right">Jurusan 1</label>
                                <div class="col-md-6">
                                    <input id="jurusan_pertama" type="text" class="form-control" name="jurusan_pertama" value="{{ old('jurusan_pertama', $pendaftaran->jurusan_pertama) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="jurusan_kedua" class="col-md-4 col-form-label text-md-right">Jurusan 2</label>
                                <div class="col-md-6">
                                    <input id="jurusan_kedua" type="text" class="form-control" name="jurusan_kedua" value="{{ old('jurusan_kedua', $pendaftaran->jurusan_kedua) }}">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="jurusan_ketiga" class="col-md-4 col-form-label text-md-right">Jurusan 3</label>
                                <div class="col-md-6">
                                    <input id="jurusan_ketiga" type="text" class="form-control" name="jurusan_ketiga" value="{{ old('jurusan_ketiga', $pendaftaran->jurusan_ketiga) }}">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
