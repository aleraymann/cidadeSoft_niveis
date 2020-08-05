<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\DataContaMovimento;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use App\model\ContaMovimento;
use Gate;

class DataContaMovimentoController extends Controller
{
    public function listar( DataContaMovimento $data_movimento)
    
    {  
        $data_movimento = $data_movimento->all();
        $criterio = "";
        return view('movimento',compact('data_movimento',"criterio"));
       
    }
    public function salvar(Request $dadosFormulario,DataContaMovimento $data_movimento, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $data_movimento->find($id);
                $dados->update($data_movimento->all());
                return redirect()
                ->action("DataContaMovimentoController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $data_movimento->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function visualizar(DataContaMovimento $data_movimento, $id)
    {
        $data_movimento = DataContaMovimento::find($id);
        if(Gate::denies('view_data_movimento', $data_movimento)){
            return redirect()->back();
        }
        $conta_movimento = ContaMovimento::all();
        $clifor = CliFor::all();
        $conta = ContaCadastro::all();
        $custo = CentroCusto::all();
        $empresa = Empresa::all();
        return view("visual.view_data_movimento", compact("data_movimento","id",'clifor','conta','custo','empresa','conta_movimento'));
    }

    public function destroy($Codigo,DataContaMovimento $data_movimento)
    {
        $data_movimento->destroy($Codigo);
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        if( $request->criterio == "1"){
            $criterio  = "Turno da Manhã";
        }else if( $request->criterio == "2"){
            $criterio  = "Turno da Tarde";
        }else{
            $criterio  = "Turno da Noite";
        }
        $data_movimento = DataContaMovimento::where( 'Turno' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("movimento", compact("data_movimento","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $data_movimento = DataContaMovimento::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("movimento", compact("data_movimento","criterio")); 
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $data_movimento = DataContaMovimento::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("movimento", compact("data_movimento", "criterio")); 
    }
}
