<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Adicional_OSPed extends Model
{
    protected $table = "adicional_osped";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
      "user_id",
      "Cod_item",
      "Cod_Ref",
      "Descricao",
      "Valor",
      "Qtd_Alterar",
      "Cod_Item_Dev",
      "Cod_Ref_Dev",
      "Qtd_Dev",
    );
}
