<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CatPlanoContas;
use App\model\SubcatPlanoContas;
use Gate;

class CatPlanoContasController extends Controller
{
    public function listar(CatPlanoContas $cat_planocontas)
    {
        $cat_planocontas = $cat_planocontas->all();
        $cat_planocontas = CatPlanoContas::paginate(20);
        $subcat_planocontas = SubcatPlanoContas::all();
        $criterio = "";
        return view("cat_planocontas", compact("cat_planocontas","criterio","subcat_planocontas"));
    }

    public function salvar(Request $dadosFormulario, CatPlanoContas $cat_planocontas, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $cat_planocontas->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CatPlanoContasController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $cat_planocontas->create($dadosFormulario->all());
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
    public function excluir($Codigo, CatPlanoContas $cat_planocontas)
    {
            $cat_planocontas->destroy($Codigo);
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        $criterio = "Cod do Pai: ". $request->criterio;
        $cat_planocontas =  CatPlanoContas::where( 'Descricao' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("cat_planocontas", compact("cat_planocontas","criterio","subcat_planocontas")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        $cat_planocontas = CatPlanoContas::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("cat_planocontas", compact("cat_planocontas","criterio","subcat_planocontas")); 
    }

}
