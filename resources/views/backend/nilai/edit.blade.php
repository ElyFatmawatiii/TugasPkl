@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Edit Nilai</div>
                        <a href="{{ route('nilai') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">

                        {{-- Notifikasi Berhasil Edit --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="student_id" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
                                <div class="col-md-6">
                                    <select id="student_id" class="form-control select2" name="student_id" required>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}" {{ $nilai->student_id == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="teacher_id" class="col-md-4 col-form-label text-md-right">Nama Guru</label>
                                <div class="col-md-6">
                                    <select id="teacher_id" class="form-control select2" name="teacher_id" required>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $nilai->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="mapel_id" class="col-md-4 col-form-label text-md-right">Mata Pelajaran</label>
                                <div class="col-md-6">
                                    <select id="mapel_id" class="form-control select2" name="mapel_id" required>
                                        @foreach ($mapels as $mapel)
                                            <option value="{{ $mapel->id }}" {{ $nilai->mapel_id == $mapel->id ? 'selected' : '' }}>
                                                {{ $mapel->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nilai" class="col-md-4 col-form-label text-md-right">Nilai</label>
                                <div class="col-md-6">
                                    <input id="nilai" type="number" class="form-control" name="nilai" value="{{ old('nilai', $nilai->nilai) }}" required min="0" max="100">
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

@section('script')
<!-- Memuat CSS dan JS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true,
            width: '100%'  // Pastikan Select2 menyesuaikan dengan lebar container
        });
    });
</script>
@endsection

