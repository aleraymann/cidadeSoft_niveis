<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcatPlanoContasController extends Controller
{
    protected $table = "subcat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "cat_id",
        "Descricao",
    );
}
