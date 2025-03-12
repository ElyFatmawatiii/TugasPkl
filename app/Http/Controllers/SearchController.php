<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student; 
use App\Models\Teacher;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query'); // Sesuaikan dengan input dari form pencarian

        if (!$query) {
            return view('search', [
                'userResults' => collect(),
                'studentResults' => collect(),
                'teacherResults' => collect(),
                'query' => ''
            ]);
        }

        // Pencarian di tabel Users
        $userResults = User::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->get();

        // Pencarian di tabel Students
        $studentResults = Student::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->orWhere('class', 'LIKE', "%{$query}%") // Jika ingin mencari berdasarkan kelas
                        ->get();


        // Pencarian di tabel Teachers
        $teacherResults = Teacher::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->orWhere('class', 'LIKE', "%{$query}%") // Jika ingin mencari berdasarkan kelas
                        ->get();

        return view('search', compact('userResults', 'studentResults', 'teacherResults', 'query'));
    }
}
