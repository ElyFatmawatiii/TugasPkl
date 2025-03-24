<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pendaftaran = Pendaftaran::select('*');

            return DataTables::of($pendaftaran)
                ->addIndexColumn()

                // ✅ Tambahkan Kolom Status
                ->addColumn('status', function ($row) {
                    $badgeClass = match ($row->status) {
                        'Pending' => 'badge bg-primary',   // Biru
                        'Diterima' => 'badge bg-success',  // Hijau
                        'Ditolak' => 'badge bg-danger',    // Merah
                        default => 'badge bg-secondary',   // Abu-abu (jika status lain)
                    };
                
                    return '<span class="' . $badgeClass . '">' . $row->status . '</span>';
                })                

                // ✅ Tambahkan Kolom Aksi
                ->addColumn('aksi', function ($row) {
                    $btn = '<div class="d-flex">
                                <a href="' . route('pendaftaran.show', $row->id) . '" class="btn btn-info btn-sm me-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="' . route('pendaftaran.edit', $row->id) . '" class="btn btn-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="delete-form-' . $row->id . '" action="' . route('pendaftaran.destroy', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $row->id . ')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                    return $btn;
                })

                ->rawColumns(['status', 'aksi']) // Pastikan status bisa dirender dalam HTML
                ->make(true);
        }

        return view('backend.pendaftaran.index');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftaran,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric|unique:pendaftaran,nomor_hp',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_email' => 'required|email|unique:pendaftaran,alamat_email',
            'jurusan_pertama' => 'required|string|max:255',
            'jurusan_kedua' => 'required|string|max:255',
            'jurusan_ketiga' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database
        Pendaftaran::create($request->only([
            'nama_lengkap',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'asal_sekolah',
            'nomor_hp',
            'nama_ayah',
            'nama_ibu',
            'alamat_email',
            'jurusan_pertama',
            'jurusan_kedua',
            'jurusan_ketiga'
        ]));

        // Redirect ke halaman utama dengan pesan sukses
        return redirect('/')->with('success', 'Pendaftaran berhasil! Anda telah terdaftar.');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.edit', compact('pendaftaran'));
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.show', compact('pendaftaran'));
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftaran,nisn,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric|unique:pendaftaran,nomor_hp,' . $id,
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_email' => 'required|email|unique:pendaftaran,alamat_email,' . $id,
            'jurusan_pertama' => 'required|string|max:255',
            'jurusan_kedua' => 'required|string|max:255',
            'jurusan_ketiga' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($request->all());

        return redirect('pendaftaran')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    function updateStatus(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();       

        return redirect('pendaftaran')->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function downloadPdf($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    
    $pdf = Pdf::loadView('backend.pendaftaran.download', compact('pendaftaran'));
    
    return $pdf->download('formulir_pendaftaran.pdf');
}

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
