<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'locais';
    protected $fillable = ['nome_do_local', 'distancia_roteador'];

    public function leituras()
    {
        return $this->hasMany(Leitura::class, 'id_local');
    }
}
