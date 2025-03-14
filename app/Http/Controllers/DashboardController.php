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

        return view('backend.dashboard.index', compact('totalUsers', 'totalSiswa', 'totalGuru', 'totalMapel'));
    }
}


