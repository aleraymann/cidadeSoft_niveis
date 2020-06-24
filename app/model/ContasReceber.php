<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContasReceber extends Model
{
    protected $table = "ctas_receber";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Sel',
        'Num_Doc',
        'Parcela',
        'Cod_Clifor',
        'Forma_Pag',
        'Cond_Pag',
        'Data_Entrada',
        'Vencimento',
        'Data_Juros',
        'Valor_Origem',
        'Valor_Divida',
        'Multa',
        'Taxa_Juros',
        'Desconto',
        'Juros',
        'Divida_Estimada',
        'Origem',
        'Local_Pag',
        'Observacoes',
        'Cod_Boleto',
        'Nosso_Numero',
        'Linha_Digitavel',
        'NF',
        'Credito',
        'Transacao',
        'Plano_Ctas',
        'Centro_Custo',
        'Empresa'
    );
}
