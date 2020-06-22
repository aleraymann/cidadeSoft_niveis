<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContasPagar;
use App\model\CliFor;
use App\model\Form_Pag;
use App\model\Cond_Pag;
use Gate;

class ContasPagarController extends Controller
{
    public function listar( ContasPagar $ctas_pagar)
    {  
        $ctas_pagar = $ctas_pagar->all();
        $ctas_pagar = ContasPagar::paginate(20);
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        return view("contas_pagar", compact("ctas_pagar","clifor","f_pag","c_pag")); 
    }
}
