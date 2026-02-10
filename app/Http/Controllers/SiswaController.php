<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\Inputaspirasi;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('user')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswas,nisn',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $user = User::create([
            'username' => $request->nisn,
            'password' => Hash::make($request->nisn),
        ]);

        Siswa::create([
            'id_user' => $user->id_user,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'siswa berhasil di update');
    }
   



    public function destroy(Siswa $siswa)
    {
        $user = $siswa->user;
        $siswa->delete();

        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
