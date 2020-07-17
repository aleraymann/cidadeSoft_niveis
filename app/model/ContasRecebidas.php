<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContasRecebidas extends Model
{
    protected $table = "ctas_recebidas";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Conta',
       'Num_Doc',
        'Parcela',
        'Cod_Clifor',
        'Forma_Pag',
        'Cond_Pag',
       'Data_Pagto',
        'Data_Baixa',
        'Tipo_Pag',
        'Valor_Origem',
        'Valor_Pago',
        'Valor_Divida',
        'Multa',
        'Desconto',
        'Juros',
        'Origem',
        'Local_Pag',
        'Num_DocCxBco',
        'Observacoes',
        'Recibo',
        'Plano_Ctas',
        'Centro_Custo',
        'Empresa',
    );

}
