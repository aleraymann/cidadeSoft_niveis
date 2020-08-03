<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ReciboTitulo extends Model
{
    
    protected $table = "recibo_tit";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Rec',
        'Cod_Tit',
    );
}
