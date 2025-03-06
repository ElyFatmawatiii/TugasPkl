<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return "Menampilkan daftar postingan";
    }

    public function create()
    {
        return "Menampilkan form untuk membuat postingan";
    }

    public function store(Request $request)
    {
        return "Menyimpan postingan baru";
    }

    public function show($id)
    {
        return "Menampilkan detail postingan dengan ID: $id";
    }

    public function edit($id)
    {
        return "Menampilkan form edit untuk postingan dengan ID: $id";
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui postingan dengan ID: $id";
    }

    public function destroy($id)
    {
        return "Menghapus postingan dengan ID: $id";
    }
}
