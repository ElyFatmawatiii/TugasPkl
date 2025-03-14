@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tables</h3>
            <ul class="breadcrumbs mb-3">
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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data User</h4>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
            </div>

            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto; max-height: 400px;">

                    <div class="d-flex justify-content-between mb-3">
                        <form action="{{ route('user') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Cari Nama atau Email"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>

                    </div>
                    <table class="table table-bordered table-hover text-start">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                            @foreach ($users as $index => $user)
                            <tr>
                                <!-- Corrected numbering calculation -->
                                <td>{{ $users->firstItem() + $index }}</td> <!-- Calculates the correct number for pagination -->
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $user->id }}')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center text-danger fw-bold">Data User Tidak Ditemukan</td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <nav>
                        <ul class="pagination">
                            @if ($users->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @for ($page = 1; $page <= $users->lastPage(); $page++)
                                @if ($page == $users->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a></li>
                                @endif
                                @endfor

                                @if ($users->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a></li>
                                @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "User akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
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