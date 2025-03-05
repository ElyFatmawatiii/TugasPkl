<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();

        //  dd($users);

        return view('student.index', compact('students'));
    }
}
