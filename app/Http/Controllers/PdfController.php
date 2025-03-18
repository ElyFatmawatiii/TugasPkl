<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{
    public function exportPdf()
    {
        // Mengambil data dari database tanpa model
        $nilai = DB::table('nilai')
            ->join('students', 'nilai.student_id', '=', 'students.id')
            ->join('teacher', 'nilai.teacher_id', '=', 'teacher.id')
            ->join('mapel', 'nilai.mapel_id', '=', 'mapel.id')
            ->select(
                'students.name as student_name', 
                'teacher.name as teacher_name', 
                'mapel.nama as mapel_nama', 
                'nilai.nilai'
            )
            ->get();

        // Load view PDF
        $pdf = Pdf::loadView('backend.nilai.nilai', compact('nilai'));

        return $pdf->stream('data-nilai.pdf'); // Menampilkan PDF di browser
    }
}