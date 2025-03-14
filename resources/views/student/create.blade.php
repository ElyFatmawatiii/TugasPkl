@extends('backend.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tambah Siswa</div>
                        <a href="{{ route('students') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                        {{-- Tambahkan enctype agar bisa upload file --}}
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class" class="col-md-4 col-form-label text-md-right">Class</label>
                                <div class="col-md-6">
                                    <input id="class" type="text" class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" value="{{ old('class') }}">
                                    @if ($errors->has('class'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('class') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address">{{ old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Input file untuk Foto --}}
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Photo</label>
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- Akhir dari .card-body dengan scrollbar --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
