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
                    <a href="#">Basic Tables</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Mapel</h4>
                <a href="{{ route('mapel.create') }}" class="btn btn-primary">Tambah</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover text-start" width="100%" id="mapel">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                <div class="table-responsive" style="overflow-x: auto; max-height: 400px;">
                </div>
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
        $('#mapel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('mapel') }}",
            dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
            columns: [{
                    data: null,
                    name: 'no',
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Menampilkan nomor urut otomatis
                    }
                },
                {
                    data: 'kode_mapel',
                    name: 'kode_mapel'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>

<script>
    function confirmDelete(kodeMapel) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Mapel akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + kodeMapel).submit();
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