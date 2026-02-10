<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input_aspirasi extends Model
{
    protected $table = 'input_aspirasis';
    protected $primaryKey = 'id_pelaporan';
    protected $fillable = [
        'id_kategori',
        'id_siswa',
        'lokasi',
        'tanggal',
        'ket',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

        public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }
}
