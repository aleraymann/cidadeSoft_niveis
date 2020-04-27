<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContaSaldo extends Model
{
    protected $table = "conta_saldo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        'Data',
        'Turno',
        'Cod_Fun',
        'Saldo_Inicial',
        'Total_Ent',
        'Total_Sai',
        'Saldo_Final',
        'Total_Dinheiro',
        'Total_Cheque',
        'Total_Cartao',
        'Total_Duplicata',
        'Situacao',
        'Cod_Conta',
        'Empresa'
    );
    public function cod_conta_saldo()
    {
        return $this->hasOne('App\model\Empresa', 'Codigo', 'Cod_empresa');
    }
}
