@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Edit Mapel</div>
                        <a href="{{ route('mapel') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">

                        {{-- Notifikasi Berhasil Edit --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('mapel.update', $mapel->kode_mapel) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="kode_mapel" class="col-md-4 col-form-label text-md-right">Kode Mapel</label>
                                <div class="col-md-6">
                                    <input id="kode_mapel" type="text" class="form-control" name="kode_mapel" value="{{ old('kode_mapel', $mapel->kode_mapel) }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Mapel</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama', $mapel->nama) }}" required>
                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
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
