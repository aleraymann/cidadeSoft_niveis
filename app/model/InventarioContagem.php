<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class InventarioContagem extends Model
{
    protected $table = "inventario_contagem";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Responsavel",
        'Codigo_Barras',
        
    );
}
