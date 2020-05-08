<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Transportadora_Valor extends Model
{
  protected $table = "transportadora_valor";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_Transp",
    "user_id",
    "KmIni",
    "KmFim",
    "Indice_v"
  );

  
  public function transportadora()
  {
    return $this->hasOne('App\model\Transportadora', 'Codigo', 'Cod_Transp');
  }

}
