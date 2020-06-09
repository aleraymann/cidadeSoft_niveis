<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contrato";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Dia_Venc',
        'Parceria',
        'Parceiro',
        'Perc_Comissao',
        'Data',
        'Tipo_Cob',
        'Convenio',
        'Valor',
        'Observacoes',
    );
}
