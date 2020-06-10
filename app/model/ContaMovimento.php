<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContaMovimento extends Model
{
    protected $table = "conta_movimento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        'user_id',
        'data_id',
       'Especie',
       'Documento',
        'Num_Doc',
       'Cod_Clifor',
        'Nome_Clifor',
       'Historico',
       'Valor',
       'Operador',
       'Cod_Conta',
       'Cod_Conta_Saldo',
       'Plano_Ctas',
       'Centro_Custo',
       'Transacao',
       'Empresa',
    );
}
