<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Transportadora_Destino extends Model
{
  protected $table = "transportadora_destino";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_Transp",
    "user_id",
    "Destino_Cidade",
    "Destino_UF",
    "Indice",
  );

  
  public function transportadora()
  {
    return $this->hasOne('App\model\Transportadora', 'Codigo', 'Cod_Transp');
  }

}
