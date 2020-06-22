<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Cotacao;
use Gate;

class CotacaoController extends Controller
{
    public function listar( Cotacao $cotacao)
    {  
        $cotacao = $cotacao->all();
        $cotacao = Cotacao::paginate(20);
        return view("cotacao", compact("cotacao")); 
    }

    public function salvar(Request $dadosFormulario, Cotacao $cotacao, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $cotacao->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CotacaoController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $cotacao->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CotacaoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CotacaoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(Cotacao $cotacao, $id)
    {
        $cotacao = $cotacao->find($id);
        if(Gate::denies('view_cotacao',$cotacao)){
            return redirect()->back();
        }
        return view("edit.edit_cotacao", compact("cotacao","id"));
    }


    public function destroy($Codigo, Cotacao $cotacao)
    {
        $cotacao->destroy($Codigo);
    }
}
