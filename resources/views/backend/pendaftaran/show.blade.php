@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Detail Pendaftaran</h3>
            <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $pendaftaran->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ $pendaftaran->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $pendaftaran->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $pendaftaran->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $pendaftaran->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $pendaftaran->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $pendaftaran->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $pendaftaran->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Email</th>
                        <td>{{ $pendaftaran->alamat_email }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 1</th>
                        <td>{{ $pendaftaran->jurusan_pertama }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 2</th>
                        <td>{{ $pendaftaran->jurusan_kedua }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan Pilihan 3</th>
                        <td>{{ $pendaftaran->jurusan_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span id="status-text" class="badge 
                                {{ $pendaftaran->status == 'Diterima' ? 'bg-success' : 
                                   ($pendaftaran->status == 'Ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $pendaftaran->status }}
                            </span>
                        </td>
                    </tr>
                </table>
                <div class="mt-4 text-center">
                    <button class="btn btn-success update-status" data-id="{{ $pendaftaran->id }}" data-status="Diterima">Diterima</button>
                    <button class="btn btn-danger update-status" data-id="{{ $pendaftaran->id }}" data-status="Ditolak">Ditolak</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".update-status").forEach(button => {
            button.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                let status = this.getAttribute("data-status");

                Swal.fire({
                    title: "Konfirmasi",
                    text: `Apakah Anda yakin ingin mengubah status menjadi ${status}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Ubah"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/pendaftaran/update-status/${id}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            },
                            body: JSON.stringify({ status: status })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Berhasil!", "Status berhasil diperbarui.", "success")
                                .then(() => {
                                    document.getElementById("status-text").innerText = status;
                                    document.getElementById("status-text").className = "badge " + (status === "Diterima" ? "bg-success" : "bg-danger");
                                });
                            } else {
                                Swal.fire("Gagal!", "Status gagal diperbarui.", "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Error!", "Terjadi kesalahan, silakan coba lagi.", "error");
                        });
                    }
                });
            });
        });
    });
</script>
@endsection