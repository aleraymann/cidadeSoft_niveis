<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AjusteEstoque extends Model
{
    protected $table = "ajuste";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Data',
        'Tipo_Mov',
        'Justificativa',
        'Situacao',
        'Cod_Fun',
        'Cod_CliFor',
        'Empresa',
    );
}
