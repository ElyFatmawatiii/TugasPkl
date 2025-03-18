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
                    <a href="#">Nilai</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Nilai</h4>
                <div>
                    <a href="{{ route('nilai.create') }}" class="btn btn-primary me-2">Tambah</a>
                    <a href="{{ route('nilai.export-pdf') }}" class="btn btn-danger">Export PDF</a>
                </div>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover text-start" width="100%" id="nilai">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Mapel</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nilai').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('nilai') }}",
            dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, // ✅ Tambahkan nomor urut
                {
                    data: 'nama_siswa',
                    name: 'nama_siswa'
                },
                {
                    data: 'nama_guru',
                    name: 'nama_guru'
                },
                {
                    data: 'mapel',
                    name: 'mapel'
                },
                {
                    data: 'nilai',
                    name: 'nilai'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Nilai akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
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