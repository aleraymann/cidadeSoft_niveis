<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Duplicata extends Model
{
    protected $table = "duplicata";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_NF',
        'Fatura',
        'Valor',
        'Vencimento',
        'Cod_CliFor',
        'Cod_Boleto',
        'Transacao',
        'Empresa',
    );
}
