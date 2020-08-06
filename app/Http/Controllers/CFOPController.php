<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CFOP;
use Gate;

class CFOPController extends Controller
{
    public function listar(CFOP $cfop)
    {  
        $cfop = $cfop->all();
        $cfop = CFOP::paginate(20);
        $criterio = "";
        return view("cfop", compact("cfop","criterio")); 
    }

    public function salvar(Request $dadosFormulario,CFOP $cfop, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $cfop->find($id);

                if($dadosFormulario['AlimFin'] == "1"){
                    $dados['AlimFin'] = $dados['AlimFin']; 
                } else{ 
                    $dados['AlimFin'] = 0;
                }
                if($dadosFormulario['AlimFisc'] == "1"){
                    $dados['AlimFisc'] = $dados['AlimFisc']; 
                } else{ 
                    $dados['AlimFisc'] = 0;
                }


                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CFOPController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $cfop->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CFOPController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("CFOPController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function editar(CFOP $cfop, $id)
    {
        $cfop = $cfop->find($id);
        if(Gate::denies('view_cfop',$cfop)){
            return redirect()->back();
        }
        return view("edit.edit_cfop", compact("cfop","id"));
    }
    public function destroy($Codigo, CFOP $cfop)
    {
        $cfop->destroy($Codigo);

    }
    public function visualizar(CFOP $cfop,  $id)
    {
        
        $cfop = $cfop->find($id);
        if(Gate::denies('view_cfop', $cfop)){
            return redirect()->back();
        }
        return view("visual.view_cfop", compact("cfop","id"));
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;

        $cfop = CFOP::where( 'CFOP' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("cfop", compact("cfop","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;

        $cfop = CFOP::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("cfop", compact("cfop","criterio")); 
    }
}
