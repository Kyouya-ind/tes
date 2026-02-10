<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Input_aspirasi;
use App\Models\Aspirasi;
use App\Models\Siswa;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function index()
    {
        $total_Aspirasi = Input_aspirasi::count();
        $total_Siswa    = Siswa::count();
        $total_Kategori = Kategori::count();
        $total_Selesai  = Aspirasi::where('status', 'Selesai')->count();

        return view('admin.home', compact(
            'total_Aspirasi',
            'total_Siswa',
            'total_Kategori',
            'total_Selesai'
        ));
    }

}
