<?php

namespace App\Http\Controllers;

use App\Models\Input_aspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Input_aspirasi::with(['siswa', 'kategori', 'aspirasi']);

    if ($request->status) {

        if ($request->status == 'Menunggu') {
            $query->whereDoesntHave('aspirasi');
        } else {
            $query->whereHas('aspirasi', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
        }
    }

        if ($request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        if ($request->bulan) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->siswa) {
            $query->where('id_siswa', $request->siswa);
        }

        if ($request->kategori) {
            $query->where('id_kategori', $request->kategori);
        }
        $aspirasis = $query->latest()->get();
        $siswas = Siswa::orderBy('nama')->get();
        $kategoris = Kategori::orderBy('ket_kategori')->get();

        return view('admin.aspirasi.index', compact(
            'aspirasis',
            'siswas',
            'kategoris'
        ));
    }

    public function show($id)
    {
        $aspirasi = Input_aspirasi::with(['siswa', 'kategori', 'aspirasi'])
            ->where('id_pelaporan', $id)
            ->firstOrFail();

        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi = Input_aspirasi::with(['siswa', 'kategori', 'aspirasi'])
            ->where('id_pelaporan', $id)
            ->firstOrFail();

        return view('admin.aspirasi.edit', compact('aspirasi'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
            'feedback' => 'required|string',
        ]);

        Aspirasi::updateOrCreate(
            ['id_pelaporan' => $id],
            [
                'status' => $request->status,
                'feedback' => $request->feedback,
            ]
        );

        return redirect()
            ->route('admin.aspirasi.index')
            ->with('success', 'Aspirasi berhasil diperbarui');
    }
}
