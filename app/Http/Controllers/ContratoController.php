<?php

namespace App\Http\Controllers;

use App\model\Contrato;
use App\model\CliFor;
use App\model\Convenio;
use Gate;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function listar( Contrato $contrato)
    {  
        $contrato = $contrato->all();
        $contrato = Contrato::paginate(20);
        $clifor = CliFor::all();
        $convenio = Convenio::all();
        $criterio = "";
        return view("contrato", compact("contrato","clifor","convenio","criterio")); 
    }

    public function salvar(Request $dadosFormulario, Contrato $contrato, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $contrato->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContratoController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $contrato->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContratoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("ContratoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(Contrato $contrato, $id)
    {
        $contrato = $contrato->find($id);
        if(Gate::denies('view_contrato',$contrato)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $convenio = Convenio::all();
        return view("edit.edit_contrato", compact("contrato","id","clifor","convenio"));
    }


    public function destroy($Codigo,Contrato $contrato)
    {
        $contrato->destroy($Codigo);
    }
    
    public function visualizar(Contrato $contrato, $id)
    {
        $contrato = $contrato->find($id);
        if(Gate::denies('view_contrato',$contrato)){
            return redirect()->back();
        }
        return view("visual.view_contrato", compact("contrato","id"));
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $convenio = Convenio::all();
        $contrato = Contrato::where( 'Cod_CliFor' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("contrato", compact("contrato","clifor","convenio","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $convenio = Convenio::all();
        $contrato = Contrato::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("contrato", compact("contrato","clifor","convenio","criterio")); 
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $clifor = CliFor::all();
        $convenio = Convenio::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $contrato = Contrato::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("contrato", compact("contrato","clifor","convenio","criterio")); 
    }
}
