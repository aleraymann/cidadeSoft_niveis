<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CliForEndereco extends Model
{
  protected $table = "clifor_endereco";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "CEP",
    "Tipo_Endereco",
    "Endereco",
    "Numero",
    "Bairro",
    "Complemento",
    "Ponto_Referencia",
    "Cod_IBGE",
    "Cidade",
    "Estado",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }

}
