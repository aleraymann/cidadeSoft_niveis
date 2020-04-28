<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class NCM extends Model
{
    protected $table = "ncm";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "NCM",
        "Descricao",
        "AliqIBPT",
        "AliqImp",
        "AliqEst",
        "AliqMun",
        "Ex",
        "Tipo",
        "VigenciaIni",
        "VigenciaFim",
        "Versao",
        "Chave",
    );
    public function cod_ncm()
    {
        return $this->hasMany(' App\model\CEST', 'Cod_ncm');
    }
}
