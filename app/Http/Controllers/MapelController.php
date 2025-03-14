<?php

namespace App\Http\Controllers;

use Datatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mapel;
use Yajra\DataTables\DataTables;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('mapel')->get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    return view('backend.mapel.aksi', compact('row'));
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('backend.mapel.index');
    }

    public function create()
    {

        return view('backend.mapel.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_mapel' => 'required|string|max:10|unique:mapel,kode_mapel',
            'nama' => 'required|string|max:255|unique:mapel,nama',
        ]);

        Mapel::create([
            'kode_mapel' => $validatedData['kode_mapel'],
            'nama' => $validatedData['nama'],
        ]);

        return redirect()->route('mapel')->with('success', 'Mapel berhasil dibuat.');
    }

    public function edit($kode_mapel)
    {
        $mapel = Mapel::where('kode_mapel', $kode_mapel)->first();
        if (!$mapel) {
            return redirect()->route('mapel')->with('error', 'Mapel tidak ditemukan.');
        }
        return view('backend.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $kode_mapel)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:mapel,nama,' . $kode_mapel . ',kode_mapel',
        ]);

        $mapel = Mapel::where('kode_mapel', $kode_mapel)->firstOrFail();
        $mapel->nama = $validatedData['nama'];
        $mapel->save();

        return redirect()->route('mapel')->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy($kode_mapel)
    {
        try {
            $mapel = Mapel::where('kode_mapel', $kode_mapel)->firstOrFail();
            $mapel->delete();

            return redirect()->route('mapel')->with('success', 'Mapel berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('mapel')->with('error', 'Gagal menghapus mapel.');
        }
    }
}
