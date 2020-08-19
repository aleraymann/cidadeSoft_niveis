<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AjusteItem extends Model
{
    protected $table = "ajuste_item";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Ajuste',
        'Cod_Item',
        'Cod_Ref',
        'Qtd',
        'Preco',
        'Total',
    );
}

