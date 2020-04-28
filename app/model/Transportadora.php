<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
  protected $table = "transportadora";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "user_id",
    "Fis_Jur",
    "Razao_Social",
    "Nome_Fantasia",
    "Endereco",
    "Bairro",
    "Cidade",
    "Estado",
    "CEP",
    "Telefone",
    "Celular",
    "Comercial",
    "Email",
    "RG",
    "CPF",
    "IE",
    "CNPJ",
    "Tipo_Frete",
    "FreteM2",
    "FreteM3",
    "FretePor",
    "FreteM",
    "Empresa",
  );

//transportadora em empresa
  public function transportadora()
  {
      return $this->belongsTo('App\model\Empresa');
  }

//empresa em transportadora
  public function transp()
  {
    return $this->belongsTo('App\model\Empresa', 'Codigo');
  }




  public function destino()
  {
    return $this->hasMany(' App\model\Transportadora', 'Cod_Transp');
  }
 
}
