<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;


class CliFor extends Model
{
  protected $table = "clifor";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "user_id",
    "Class_ABC",
    "Tip",
    "Ativo",
    "Data_Cadastro",
    "Fis_Jur",
    "Razao_Social",
    "Nome_Fantasia",
    "Data_Nascimento",
    "Estado_Civil",
    "Sexo",
    "CNPJ",
    "IE",
    "IEST",
    "IM",
    "CPF",
    "RG",
    "Telefone",
    "Operadora1",
    "Celular",
    "Operadora2",
    "Comercial",
    "Operadora3",
    "Email",
    "Site",
    "Cli_Atacado",
    "Perfil",
    "Profissao",
    "SitFinanc",
    "LimiCred",
    "PercDescAcresc",
    "Vendedor",
    "Local_UltMov",
    "Data_UltMov",
    "Observacoes",
    "Aviso",
    "Empresa",
  );
 
//empresa em clifor
  public function empresa()
  {
      return $this->belongsTo('App\model\Empresa', 'Codigo');
  }
  
//vendedor em clifor
  public function vendedor()
  {
    return $this->hasOne('App\model\Funcionario', 'Codigo');
  }
  
  public function clifor()
  {
    return $this->hasMany(' App\model\CliFor', 'Cod_clifor');
  }
  public function cod_clifor_boleto()
  {
    return $this->hasMany(' App\model\BoletoTitulo', 'Cod_clifor');
  }
}



