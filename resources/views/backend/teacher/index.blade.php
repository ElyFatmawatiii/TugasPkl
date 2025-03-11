@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h3 class="fw-bold mb-0 me-3">Tables</h3>
                <ul class="breadcrumbs mb-0 d-flex">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Tables</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Guru</h4>
                <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <!-- Tambahkan max-height dan overflow-y agar table bisa discroll vertikal -->
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered table-hover text-start">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Photo</th> 
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $no++ }}</td> 
                                <td class="text-center">
                                    @if(!empty($teacher->image))
                                        <img src="{{ url('backend/assets/' . $teacher->image) }}" alt="Foto Guru" class="img-thumbnail" width="50">
                                    @else
                                        <img src="{{ url('backend/assets/default.png') }}" alt="Foto Default" class="img-thumbnail" width="50">
                                    @endif
                                </td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ ucfirst($teacher->gender) }}</td>
                                <td>
                                    @if($teacher->status == 'active')
                                        <span class="badge bg-success text-white">Active</span>
                                    @else
                                        <span class="badge bg-danger text-white">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center text-nowrap">
                                    <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>  
                                    </a>  
                                    <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $teacher->id }}" action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $teacher->id }})" data-bs-toggle="tooltip" title="Hapus Data">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        function confirmDelete(teacherId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data siswa akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + teacherId).submit();
                }
            })
        }
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
