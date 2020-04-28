<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContaCadastro extends Model
{
    
    protected $table = "conta_cadastro";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
    "user_id",
    'Descricao',
    'Cod_Banco',
    'Dig_Banco',
    'Nome_Banco',
    'Cod_Banco_Cob',
    'Dig_Banco_Cob',
    'Praca',
    'Cod_Age',
    'Dig_Age',
    'CC',
    'Digito',
    'Tipo_Conta',
    'Tipo_Cobranca', 
    'Cod_Cedente',
    'Convenio',
    'Carteira',
    'Uso_Bco',
    'Cod_Moeda',
    'Especie', 
    'Especie_Doc',
    'Aceite',
    'Local_Pgto',
    'Dias_Desc',
    'Perc_Desc',
    'Perc_Multa',
    'Perc_Juros',
    'Dias_AvisoProt',
    'Dias_Prot',
    'Tx_Emissao',
    'Empresa',
    );


  //empresa em conta
    public function empresa() {
      return $this->belongsTo('App\model\Empresa' , 'Empresa');
  }
}
