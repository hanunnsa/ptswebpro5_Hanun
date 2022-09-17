<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa/create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'jurusan' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Berhasil menambahkan.');
    }

    public function edit(Siswa $siswa)
    {
   return view('siswa.edit', compact('siswa'));
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
       return redirect()->route('siswa.index')->with('success','Berhasil Dihapus');
    }

}
