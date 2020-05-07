<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;

class CliForContato extends Model
{
  protected $table = "clifor_contato";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "Tipo",
    "Setor",
    "Nome",
    "Data_Nasc",
    "RG",
    "CPF",
    "Celular",
    "Email",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }

}
