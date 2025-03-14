@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tambah Mapel</div>
                        <a href="{{ route('mapel') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mapel.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="kode_mapel" class="col-md-4 col-form-label text-md-right">Kode Mapel</label>
                                <div class="col-md-6">
                                    <input id="kode_mapel" type="text" class="form-control" name="kode_mapel" value="{{ old('kode_mapel') }}">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Mata Pelajaran</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
                                    @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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