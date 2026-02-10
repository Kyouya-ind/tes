<?php

namespace App\Http\Controllers;

use App\Models\Input_aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputaspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Input_aspirasi::with(['kategori', 'aspirasi'])
            ->where('id_siswa', Auth::user()->siswa->id_siswa);

        if ($request->status) {
            if ($request->status == 'Menunggu') {
                $query->whereDoesntHave('aspirasi');
            } else {
                $query->whereHas('aspirasi', function ($q) use ($request) {
                    $q->where('status', $request->status);
                });
            }
        }

        $data = $query->orderBy('tanggal', 'desc')->get();

        return view('siswa.aspirasi.index', compact('data'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        return view('siswa.aspirasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'ket' => 'required|string',
        ]);

        Input_aspirasi::create([
            'id_kategori' => $request->id_kategori,
            'id_siswa' => Auth::user()->siswa->id_siswa,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
        ]);

        return redirect()->route('siswa.aspirasi.index')
            ->with('success', 'Aspirasi berhasil dikirim');
    }

    public function show($id)
    {
        $aspirasi = Input_aspirasi::with(['kategori', 'aspirasi'])
            ->where('id_pelaporan', $id)
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->firstOrFail();

        return view('siswa.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi = Input_aspirasi::with('aspirasi')
            ->where('id_pelaporan', $id)
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->firstOrFail();

        if ($aspirasi->aspirasi && $aspirasi->aspirasi->status !== 'Menunggu') {
            return redirect()->route('siswa.aspirasi.index')
                ->with('error', 'Aspirasi tidak dapat diedit karena sudah diproses');
        }

        $kategoris = Kategori::all();
        return view('siswa.aspirasi.edit', compact('aspirasi', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $aspirasi = Input_aspirasi::with('aspirasi')
            ->where('id_pelaporan', $id)
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->firstOrFail();

        if ($aspirasi->aspirasi && $aspirasi->aspirasi->status !== 'Menunggu') {
            return redirect()->route('siswa.aspirasi.index')
                ->with('error', 'Aspirasi tidak dapat diedit');
        }

        $request->validate([
            'id_kategori' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'ket' => 'required|string',
        ]);

        $aspirasi->update($request->only([
            'id_kategori',
            'tanggal',
            'lokasi',
            'ket'
        ]));

        return redirect()->route('siswa.aspirasi.index')
            ->with('success', 'Aspirasi berhasil diperbarui');


    }

    public function destroy($id)
    {
        $aspirasi = Input_aspirasi::with('aspirasi')
            ->where('id_pelaporan', $id)
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->firstOrFail();

        if ($aspirasi->aspirasi && $aspirasi->aspirasi->status !== 'Menunggu') {
            return redirect()->route('siswa.aspirasi.index')
                ->with('error', 'Aspirasi tidak dapat dihapus karena sudah diproses');
        }

        $aspirasi->delete();

        return redirect()->route('siswa.aspirasi.index')
            ->with('success', 'Aspirasi berhasil dihapus');
    }

}
