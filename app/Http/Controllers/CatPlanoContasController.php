<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatPlanoContasController extends Controller
{
    protected $table = "cat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
    );
}
