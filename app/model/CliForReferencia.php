<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CliForReferencia extends Model
{
  protected $table = "clifor_referencia";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "Loja_Banco",
    "Conta",
    "Telefone",
    "Ult_Compra",
    "Valor_UltCompra",
    "Limite",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }
}