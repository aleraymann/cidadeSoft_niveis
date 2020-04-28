<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Form_Pag extends Model
{
    protected $table = "fin_formapag";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
        "Comi_Operad",
        "Tx_Antecip",
        "Tipo",
        "Destino",
        "Dest_CliFor",
    );
    //form_pag em empresa
  public function form_pag()
  {
    return $this->belongsTo('App\model\Empresa');
  }
}
