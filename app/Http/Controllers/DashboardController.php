<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = DB::table('users')->count();
        $totalSiswa = DB::table('students')->count();
        $totalGuru = DB::table('teacher')->count();
        $totalMapel = DB::table('mapel')->count();

                // Data untuk Pie Chart
                $userCount = DB::table('users')->count();
                $studentCount = DB::table('students')->count();
                $teacherCount = DB::table('teacher')->count();
                $mapelCount = DB::table('mapel')->count();
            
                $pieLabels = ['Users', 'Students', 'Teacher', 'Mapel'];
                $pieData = [$userCount, $studentCount, $teacherCount, $mapelCount];
            
                // Mengelompokkan nilai ke dalam kategori A-E
                $nilaiData = DB::table('nilai')
                            ->selectRaw("
                                CASE 
                                    WHEN nilai BETWEEN 85 AND 100 THEN 'A'
                                    WHEN nilai BETWEEN 70 AND 84 THEN 'B'
                                    WHEN nilai BETWEEN 55 AND 69 THEN 'C'
                                    WHEN nilai BETWEEN 40 AND 54 THEN 'D'
                                    ELSE 'E' 
                                END as kategori,
                                COUNT(*) as frekuensi
                            ")
                            ->groupBy('kategori')
                            ->orderByRaw("FIELD(kategori, 'A', 'B', 'C', 'D', 'E')")
                            ->get();
                            // Konversi ke array untuk chart nilai
        $nilaiLabels = $nilaiData->pluck('kategori')->toArray();
        $nilaiFrequencies = $nilaiData->pluck('frekuensi')->toArray();
    
        return view('backend.dashboard.index', compact('totalUsers', 'totalSiswa', 'totalGuru', 'totalMapel',  'nilaiLabels', 'nilaiFrequencies', 'pieLabels', 'pieData'));
    }
}
        



