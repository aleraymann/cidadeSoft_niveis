<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BoletoTitulo extends Model
{
    protected $table = "boleto_titulo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
      "Sel",
      "Cod_Conta",
      "Data_Doc",
      "Vencimento",
      "Nro_Doc",
      "Nosso_Num",
      "Valor",
      "Msg_1",
      "Msg_2",
      "Msg_3",
      "Inst_1",
      "Inst_2",
      "Multa",
      "Taxa_Juros",
      "Acrescimo",
      "Desconto",
      "Cod_CliFor",
      "Cod_NF",
      "Cod_CtaRec",
      "Data_Bai",
      "Data_Liq",
      "Situacao",
      "Cod_Rem",
      "Transacao",
      "Empresa",
    );

   
    //empresa em boleto
    public function boleto()
     {
      return $this->belongsTo('App\model\Empresa', 'Codigo');
     }

    public function cod_conta_boleto()
    {
        return $this->hasOne('App\model\ContaCadastro', 'Codigo', 'Cod_conta');
    }
    public function cod_clifor_boleto()
    {
        return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
    }
    public function cod_remessa_()
    {
        return $this->hasOne('App\model\BoletoRemessa', 'Codigo', 'Cod_remessa');
    }
    public function cod_empresa_boleto()
    {
        return $this->hasMany(' App\model\BoletoTitulo', 'Cod_empresa');
    }

}
