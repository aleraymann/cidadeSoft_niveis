<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Fluxo;
use App\model\ContaCadastro;
use App\model\Empresa;
use Gate;

class FluxoController extends Controller
{
    public function listar(Fluxo $fluxo)
    {  
        $fluxo = $fluxo->all();
        $fluxo = Fluxo::paginate(20);
        $conta = ContaCadastro::all();
        $empresa = Empresa::all();
        $criterio = "";
        return view("fluxo", compact("fluxo","conta","empresa","criterio")); 
    }

    public function salvar(Request $dadosFormulario,Fluxo $fluxo, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $fluxo->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("FluxoController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $fluxo->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("FluxoController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("FluxoController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function editar(Fluxo $fluxo, $id)
    {
        $fluxo = $fluxo->find($id);
        if(Gate::denies('view_fluxo',$fluxo)){
            return redirect()->back();
        }
        $conta = ContaCadastro::all();
        $empresa = Empresa::all();
        return view("edit.edit_fluxo", compact("fluxo","id","conta","empresa"));
    }

    public function destroy($Codigo, Fluxo $fluxo)
    {
        $fluxo->destroy($Codigo);

    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $conta = ContaCadastro::all();
        $empresa = Empresa::all();
        $fluxo = Fluxo::where( 'Cod_Conta' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("fluxo", compact("fluxo","conta","empresa","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $conta = ContaCadastro::all();
        $empresa = Empresa::all();
        $fluxo = Fluxo::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("fluxo", compact("fluxo","conta","empresa","criterio")); 
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $conta = ContaCadastro::all();
        $empresa = Empresa::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $fluxo = Fluxo::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("fluxo", compact("fluxo","conta","empresa","criterio")); 
    }

}
