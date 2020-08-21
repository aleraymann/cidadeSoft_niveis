<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CatPlanoContas;
use App\model\SubcatPlanoContas;
use Gate;

class SubcatPlanoContasController extends Controller
{
    public function salvar(Request $dadosFormulario, SubcatPlanoContas $subcat_planocontas, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $subcat_planocontas->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CatPlanoContasController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $subcat_planocontas->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CatPlanoContasController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("CatPlanoContasController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function excluir($Codigo, SubcatPlanoContas $subcat_planocontas)
    {
            $subcat_planocontas->destroy($Codigo);
    }

}
