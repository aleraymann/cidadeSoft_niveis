<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Gate;
use App\model\Empresa;

class PDVController extends Controller
{
    public function listar()

    {  
        return view("emp_pdv"); 
    }
   

    public function pesquisaAjax(Request $request){
        $CNPJ = $request['CNPJ'];
        $dados = DB::select("SELECT Nome_Fantasia, Codigo FROM `empresa` WHERE CNPJ = '$CNPJ' ");
        if($dados){
            // se existir dados no banco ele gera o array de informações 
            foreach($dados as $dados){
                $dados1['Nome_Fantasia'] = $dados->Nome_Fantasia;
                $dados1['Codigo'] = $dados->Codigo; 
            }
        }else{
            // se retornou vazio, ele manda null pro ajax
            $dados1 = null;
        }
        return json_encode($dados1);
    }
    public function pdv(Request $request)
    { 
       //dd($request->cod_empresa);
       $cod_empresa =  $request['cod_empresa'];
       $nome_empresa =  $request['Nome_Fantasia'];

       $empresa = Empresa::find($cod_empresa);
       if(Gate::denies('view_empresa', $empresa)){
        return redirect("/pdv")
        ->with("toast_error", "Ação não Autorizada!, informe outro CNPJ!");
    }
        return view("pdv", compact("cod_empresa", "nome_empresa")); 
    }
}
