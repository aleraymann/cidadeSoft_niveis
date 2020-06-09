<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BoletoRemessa extends Model
{
    protected $table = "boleto_remessa";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
      "user_id",
      "Numero_Rem",
      "Data",
      "Hora",
      "Arquivo",
      "Cod_Conv",
    );
    public function cod_remessa()
    {
      return $this->hasMany(' App\model\BoletoTitulo', 'Cod_remessa');
    }
    //convenio em remessa
    public function cod_ncm()
    {
        return $this->hasOne('App\model\Convenio', 'Codigo', 'Cod_convenio');
    }
}
