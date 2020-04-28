<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cond_Pag extends Model
{
    protected $table = "fin_condpag";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Condicao",
        "Tab_Preco",
        "ParcDias",
        "ParcForma",
        "ParcJuros",
    );
    
//cond_pag em empresa
  public function cond_pag()
  {
    return $this->belongsTo('App\model\Empresa');
  }

    public function form_pag()
    {
        return $this->hasMany(' App\model\Empresa', 'Cod_forma');
    }
}
