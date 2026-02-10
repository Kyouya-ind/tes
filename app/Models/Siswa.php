<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'id_user',
        'nisn',
        'nama',
        'kelas',
        'jurusan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function input_aspirasi()
    {
        return $this->hasMany(Input_aspirasi::class, 'id_siswa', 'id_siswa');
    }
}
