<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\PlanoContas;
use App\model\CatPlanoContas;
use App\model\SubcatPlanoContas;
use Gate;

class PlanoContasController extends Controller
{
    public function listar(PlanoContas $planocontas)
    {
        $planocontas = $planocontas->all();
        $planocontas = Planocontas::paginate(20);
        $cat_planocontas = CatPlanocontas::all();
        $sub_catplanocontas = SubcatPlanocontas::all();
        $criterio = "";
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","sub_catplanocontas"));
    }
}
