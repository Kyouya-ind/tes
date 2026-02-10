<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasis';
    protected $primaryKey = 'id_aspirasi';
    protected $fillable = [
        'id_pelaporan',
        'status',
        'feedback',
    ];

    public function input_aspirasi()
    {
        return $this->belongsTo(Input_aspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }
}
