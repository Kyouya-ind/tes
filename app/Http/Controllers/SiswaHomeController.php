<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Input_aspirasi;
use Illuminate\Support\Facades\Auth;

class SiswaHomeController extends Controller
{
    public function index()
    {
        $idSiswa = Auth::user()->siswa->id_siswa;

        $totalAspirasi = Input_aspirasi::where('id_siswa', $idSiswa)->count();

        $menunggu = Input_aspirasi::where('id_siswa', $idSiswa)
            ->whereDoesntHave('aspirasi')
            ->count();

        $diproses = Input_aspirasi::where('id_siswa', $idSiswa)
            ->whereHas('aspirasi', function ($q) {
                $q->where('status', 'Diproses');
            })->count();

        $selesai = Input_aspirasi::where('id_siswa', $idSiswa)
            ->whereHas('aspirasi', function ($q) {
                $q->where('status', 'Selesai');
            })->count();

        return view('siswa.home', compact(
            'totalAspirasi',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }
}
