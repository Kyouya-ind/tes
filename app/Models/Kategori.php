<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'ket_kategori',
    ];

    public function input_aspirasi()
    {
        return $this->hasMany(Input_aspirasi::class, 'id_kategori', 'id_kategori');
    }
}
