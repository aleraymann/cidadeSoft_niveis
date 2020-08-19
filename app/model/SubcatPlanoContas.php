<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SubcatPlanoContas extends Model
{
    protected $table = "subcat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "cat_id",
        "Descricao",
    );
}
