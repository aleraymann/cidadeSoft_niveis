<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\PlanoContas;
use App\model\CatPlanoContas;
use App\model\SubcatPlanoContas;
use Gate;
use Illuminate\Support\Facades\DB;

class PlanoContasController extends Controller
{
    public function listar(PlanoContas $planocontas)
    {
        $planocontas = $planocontas->all();
        $planocontas = Planocontas::paginate(20);
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        $criterio = "";
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","subcat_planocontas"));
    }

    public function pesquisaSub(Request $request){
        $id = $request['id'];
        $dados = DB::select("SELECT * FROM `subcat_planoconta` WHERE cat_id = '$id' order by Descricao asc ");
        return ($dados);
    }

    public function salvar(Request $dadosFormulario, PlanoContas $planocontas, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $planocontas->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("PlanoContasController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $planocontas->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("PlanoContasController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("PlanoContasController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function excluir($Codigo, PlanoContas $planocontas)
    {
            $planocontas->destroy($Codigo);
    }

    public function editar( PlanoContas $planocontas, $id)
    {
        $planocontas = $planocontas->find($id);
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        if(Gate::denies('view_planocontas',$planocontas)){
            return redirect()->back();
        }
        return view("edit.edit_planocontas", compact("planocontas","id","cat_planocontas","subcat_planocontas"));
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        $criterio = "Cod do Pai: ". $request->criterio;
        $planocontas =  PlanoContas::where( 'CodPai' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","subcat_planocontas")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        $planocontas = PlanoContas::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","subcat_planocontas")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        if( $request->criterio == "CV"){
            $criterio  = "Variável";
        }else if( $request->criterio == "CF"){
            $criterio  = "Fixo";
        }
        $planocontas = PlanoContas::where( 'Tipo_Custo' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","subcat_planocontas")); 
    }
    public function busca4( Request $request){
        $criterio  = $request->criterio;
        $cat_planocontas = CatPlanocontas::all();
        $subcat_planocontas = SubcatPlanocontas::all();
        if( $request->criterio == "D"){
            $criterio  = "Débito";
        }else if( $request->criterio == "C"){
            $criterio  = "Crédito";
        }
        $planocontas = PlanoContas::where( 'CD' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("planocontas", compact("planocontas","criterio","cat_planocontas","subcat_planocontas")); 
    }
}
