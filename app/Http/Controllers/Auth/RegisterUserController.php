<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.registeruser'); // Tambahkan 'auth.'
    }
    
    public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    // Simpan data ke database
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
}

}
