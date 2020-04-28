<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CEST extends Model
{
    protected $table = "cest";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CEST",
        "NCM",
        "Descricao",
    );
    public function cod_ncm()
    {
        return $this->hasOne('App\model\NCM', 'Codigo', 'Cod_ncm');
    }
}
