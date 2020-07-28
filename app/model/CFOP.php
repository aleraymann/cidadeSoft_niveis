<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CFOP extends Model
{
    protected $table = "operacaofiscal";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_CliFor",
        'CFOP',
        'Descricao',
        'Aplicacao',
        'Dispositivo',
        'ES',
        'AlimFin',
        'AlimFisc',
        'ObsnaNFe',
    );
}
