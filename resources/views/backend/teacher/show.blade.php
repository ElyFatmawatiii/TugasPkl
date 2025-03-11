@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Detail Guru</h3>
            <a href="{{ route('teacher') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <div class="text-center mb-3">
                    @if(!empty($teacher->image))
                        <img src="{{ url('backend/assets/' . $teacher->image) }}" alt="Foto Guru" class="img-thumbnail" width="150">
                    @else
                        <img src="{{ url('backend/assets/default.png') }}" alt="Foto Default" class="img-thumbnail" width="150">
                    @endif
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $teacher->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $teacher->email }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $teacher->phone }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $teacher->address }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ ucfirst($teacher->gender) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                        @if($teacher->status == 'active')
                            <span class="badge bg-success text-white">Active</span>
                        @else
                            <span class="badge bg-danger text-white">Inactive</span>
                        @endif
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
