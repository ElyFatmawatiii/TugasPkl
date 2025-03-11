<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use illuminate\Support\File;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = DB::table('teacher')->get();

        return view('backend.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('backend.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            'gender'  => 'required|in:male,female',
            'status'  => 'required|in:active,inactive',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/assets/teacher'), $filename);
            $photoPath = 'teacher/' . $filename;
        }

        DB::table('teacher')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'gender'     => $request->gender,
            'status'     => $request->status,
            'image'      => $photoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('teacher')->with('success', 'Data Berhasil Disimpan.');
    }
    public function show($id)
    {
        $teacher = DB::table('teacher')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('backend.teacher')->with('error', 'Data tidak ditemukan');
        }

        return view('backend.teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = DB::table('teacher')->where('id', $id)->first();
        if (!isset($teacher->image)) {
            $teacher->image = null;
        }
        return view('backend.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            'gender'  => 'required|in:male,female',
            'status'  => 'required|in:active,inactive',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $teacher = DB::table('teacher')->where('id', $id)->first();
        $photoPath = $teacher->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/assets/teacher'), $filename);
            $photoPath = 'teacher/' . $filename;
        }

        DB::table('teacher')->where('id', $id)->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'gender'     => $request->gender,
            'status'     => $request->status,
            'image'      => $photoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('teacher')->with('success', 'Data Berhasil Diperbaharui.');
    }

    

    public function destroy($id)
    {
        DB::table('teacher')->where('id', $id)->delete();
        return redirect()->route('teacher')->with('success', 'Data Berhasil Dihapus.');
    }
}
