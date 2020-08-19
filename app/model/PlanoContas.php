<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PlanoContas extends Model
{
    protected $table = "planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CodPai",
        "Descricao",
        "CD",
        "Conta",
        "Tipo_Custo",
    );
}
