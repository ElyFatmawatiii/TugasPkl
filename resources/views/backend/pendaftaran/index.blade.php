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
                    <a href="#">Pendaftaran</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Pendaftaran</h4>
                
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover text-start" width="100%" id="pendaftaran">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Nomor HP</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Email</th>
                            <th>Jurusan 1</th>
                            <th>Jurusan 2</th>
                            <th>Jurusan 3</th>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#pendaftaran').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('pendaftaran') }}",
            dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nisn',
                    name: 'nisn'
                },
                {
                    data: 'tempat_lahir',
                    name: 'tempat_lahir'
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'asal_sekolah',
                    name: 'asal_sekolah'
                },
                {
                    data: 'nomor_hp',
                    name: 'nomor_hp'
                },
                {
                    data: 'nama_ayah',
                    name: 'nama_ayah'
                },
                {
                    data: 'nama_ibu',
                    name: 'nama_ibu'
                },
                {
                    data: 'alamat_email',
                    name: 'alamat_email'
                },
                {
                    data: 'jurusan_pertama',
                    name: 'jurusan_pertama'
                },
                {
                    data: 'jurusan_kedua',
                    name: 'jurusan_kedua'
                },
                {
                    data: 'jurusan_ketiga',
                    name: 'jurusan_ketiga'
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
            text: "Data akan dihapus secara permanen!",
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
        });
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