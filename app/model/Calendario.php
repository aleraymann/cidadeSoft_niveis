<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = "events";
    public $timestamps = false;
    protected $fillable = Array(
        "user_id",
        'cod_usuario',
        'evento',
        'descricao',
        'cor',
        'data_inicio',
        'data_fim'
    );
}
