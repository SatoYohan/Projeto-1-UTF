<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_local', 'data_e_hora', 'dbm_2_4_ghz', 'dbm_5_ghz',
        'mbps_2_4_ghz', 'mbps_5_ghz', 'interferencia_2_4_ghz', 'interferencia_5_ghz'
    ];

    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }
}
