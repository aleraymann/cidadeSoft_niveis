<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = "convenio";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Convenio",
        "Comissao"
    );

    //convenio em remessa
    public function cod_convenio()
    {
        return $this->hasMany(' App\model\BoletoRemessa', 'Cod_convenio');
    }
}
