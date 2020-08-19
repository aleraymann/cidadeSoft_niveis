<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CatPlanoContas extends Model
{
    protected $table = "cat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CodPai",
        "Descricao",
    );
}
