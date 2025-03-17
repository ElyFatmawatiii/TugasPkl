@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tambah Nilai</div>
                        <a href="{{ route('nilai') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST">
                            @csrf

                            <!-- Pilih Siswa -->
                            <div class="form-group row">
                                <label for="student_id" class="col-md-4 col-form-label text-md-right">Siswa</label>
                                <div class="col-md-6">
                                    <select id="student_id" class="form-control" name="student_id" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Pilih Guru -->
                            <div class="form-group row mt-3">
                                <label for="teacher_id" class="col-md-4 col-form-label text-md-right">Guru</label>
                                <div class="col-md-6">
                                    <select id="teacher_id" class="form-control" name="teacher_id" required>
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Pilih Mata Pelajaran -->
                            <div class="form-group row mt-3">
                                <label for="mapel_id" class="col-md-4 col-form-label text-md-right">Mata Pelajaran</label>
                                <div class="col-md-6">
                                    <select id="mapel_id" class="form-control" name="mapel_id" required>
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @foreach($mapels as $mapel)
                                            <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Input Nilai -->
                            <div class="form-group row mt-3">
                                <label for="nilai" class="col-md-4 col-form-label text-md-right">Nilai</label>
                                <div class="col-md-6">
                                    <input id="nilai" type="number" class="form-control{{ $errors->has('nilai') ? ' is-invalid' : '' }}" 
                                        name="nilai" value="{{ old('nilai') }}" required min="0" max="100">
                                    @if ($errors->has('nilai'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nilai') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            

                            <!-- Tombol Simpan -->
                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
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
