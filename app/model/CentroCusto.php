<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    
    protected $table = "centro_custo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
    );

}
