<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CentroCusto;
use Gate;

class CentroCustoController extends Controller
{
    public function listar( CentroCusto $centrocusto)
    {  
        if(Gate::denies('view_financeiro')){
            return redirect()->back();
        }
        $centrocusto = $centrocusto->all();
        $centrocusto = CentroCusto::paginate(20);
        $criterio = "";
        return view("centrocusto", compact("centrocusto","criterio")); 
    }
    public function salvar(Request $dadosFormulario, CentroCusto $centrocusto, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $centrocusto->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
            ->action("CentroCustoController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $centrocusto->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CentroCustoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CentroCustoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo,  CentroCusto $centrocusto) 
    {
        $centrocusto->destroy($Codigo);
                
    }

    public function editar (CentroCusto $centrocusto, $id)
    {
        $centrocusto = $centrocusto->find($id);
        if(Gate::denies('view_centroCusto', $centrocusto)){
            return redirect()->back();
        }
        return view("edit.edit_centrocusto", compact("centrocusto","id"));
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $centrocusto = CentroCusto::where( 'Descricao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("centrocusto", compact("centrocusto","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $centrocusto = CentroCusto::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("centrocusto", compact("centrocusto","criterio")); 
    }

}
