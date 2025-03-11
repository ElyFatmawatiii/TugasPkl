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

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'class'   => 'required',
            'address' => 'required',
            'gender'  => 'required|in:male,female',
            'status'  => 'required|in:active,inactive',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

    $photoPath = null;
if ($request->hasFile('image')) {
    $file = $request->file('image');
    // Membuat nama file unik menggunakan timestamp dan ekstensi asli file
    $filename = time() . '.' . $file->getClientOriginalExtension();
    // Memindahkan file ke folder public/students
    $file->move(public_path('backend/assets/students'), $filename);
    // Menyimpan path file relatif, misalnya "students/1634567890.jpg"
    $photoPath = 'students/' . $filename;
}

    
        DB::table('students')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'class'      => $request->class,
            'address'    => $request->address,
            'gender'     => $request->gender,
            'status'     => $request->status,
            'image'      => $photoPath, // Simpan path file foto
            'created_at' => now(),  
            'updated_at' => now(),
        ]);
    
        return redirect()->route('students')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
    
        if (!$student) {
            return redirect()->route('students')->with('error', 'Data tidak ditemukan');
        }
    
        return view('student.show', compact('student'));
    }
     

   public function edit($id)
{
    $student = DB::table('students')->where('id', $id)->first();
    // Jika properti photo belum ada, berikan nilai default null
    if (!isset($student->image)) {
        $student->image= null;
    }
    return view('student.edit', compact('student'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'class' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'status' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Ambil data siswa lama
    $student = DB::table('students')->where('id', $id)->first();

    $photoPath = $student->image; // Default tetap foto lama

    // Jika ada file baru diupload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('backend/assets/students'), $filename);
        $photoPath = 'students/' . $filename;
    }

    // Update database dengan path foto baru
    DB::table('students')->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'class' => $request->class,
        'address' => $request->address,
        'gender' => $request->gender,
        'status' => $request->status,
        'image' => $photoPath,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('students')->with('success', 'Data berhasil diperbarui.');
}

    public function destroy($id)    
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students')->with('success', 'Data berhasil dihapus.');
    }   


}
