<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Cond_Pag;
use App\model\Empresa;
use Gate;

class Cond_PagController extends Controller
{
    public function listar( Cond_Pag $cond_pag)
    {  
        if(Gate::denies('view_financeiro')){
            return redirect()->back();
        }
        $cond_pag = $cond_pag->all();
        $cond_pag = Cond_Pag::paginate(20);
        $criterio = "";
        return view("cond_pag", compact("cond_pag","criterio")); 
    }
    public function salvar(Request $dadosFormulario, Cond_Pag $cond_pag, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $cond_pag->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("Cond_PagController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $cond_pag->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("Cond_PagController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("Cond_PagController@listar")
            ->with("toast_error","Houve um erro ao gravar o registro");
        }
    }
    public function editar(Cond_Pag $cond_pag, $id)
    {
        $cond_pag = $cond_pag->find($id);
        if(Gate::denies('view_condPag', $cond_pag)){
            return redirect()->back();
        }
        return view("edit.edit_cond_pag", compact("cond_pag","id"));
    }

    public function excluir($Codigo, Cond_Pag $cond_pag)
    {
        $cond_pag->destroy($Codigo);
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $cond_pag = Cond_Pag::where( 'Condicao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("cond_pag", compact("cond_pag","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $cond_pag = Cond_Pag::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("cond_pag", compact("cond_pag","criterio")); 
    }


}
