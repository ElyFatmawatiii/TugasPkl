<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    /**
     * Menampilkan data nilai dengan DataTables.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Nilai::with(['student', 'teacher', 'mapel'])->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('nama_siswa', function ($row) {
                    return $row->student ? $row->student->name : '-';
                })
                ->addColumn('nama_guru', function ($row) {
                    return $row->teacher ? $row->teacher->name : '-';
                })
                ->addColumn('mapel', function ($row) {
                    return $row->mapel ? $row->mapel->nama : '-';
                })
                ->addColumn('aksi', function ($row) {
                    return view('backend.nilai.aksi', compact('row'));
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('backend.nilai.index');
    }

    public function exportPDF()
    {
 
        $data = Nilai::with(['students', 'teacher', 'mapel'])->get();

 
        $pdf = Pdf::loadView('backend.nilai.pdf', compact('data'));

        return $pdf->download('Data_Nilai.pdf');
    }
    /**
     * Menampilkan form untuk membuat nilai baru.
     */
    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $mapels = Mapel::all();

        return view('backend.nilai.create', compact('students', 'teachers', 'mapels'));
    }

    /**
     * Simpan nilai ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teacher,id',
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        Nilai::create([
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai')->with('success', 'Nilai berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit nilai.
     */
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $students = Student::all();
        $teachers = Teacher::all();
        $mapels = Mapel::all();

        return view('backend.nilai.edit', compact('nilai', 'students', 'teachers', 'mapels'));
    }

    /**
     * Mengupdate nilai dalam database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teacher,id',
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilai')->with('success', 'Nilai berhasil diperbarui.');
    }

    /**
     * Menghapus nilai dari database.
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai')->with('success', 'Nilai berhasil dihapus.');
    }

    /**
     * Export data nilai ke dalam PDF.
     */
   
}
