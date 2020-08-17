<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comissao extends Model
{
    protected $table = "funcionario_comissao";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'OS_Ped',
        'Cod_Venda',
        'Cod_Fun',
        'Valor',
        'Cod_Item',
        'Transacao',
        'Comissao',
        'Data_Prev',
        'Situacao',
        'Status',
        'Cod_Conta',
    );
    
}
