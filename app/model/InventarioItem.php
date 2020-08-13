<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class InventarioItem extends Model
{
    protected $table = "inventario_item";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Invent',
        'Cod_Ref',
        'Cod_Item',
        'Cod_Barras',
        'Qtd_EstoqueF',
        'Qtd_EstoqueL',
        'Qtd_Contagem',
        'Divergencia',
        
    );
}
