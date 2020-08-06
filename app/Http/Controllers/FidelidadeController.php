<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Fidelidade;
use App\model\CliFor;
use Gate;

class FidelidadeController extends Controller
{
    public function listar(Fidelidade $fidelidade)
    {  
        $fidelidade = $fidelidade->all();
        $fidelidade = Fidelidade::paginate(20);
        $clifor = CliFor::all();
        $criterio = "";
        return view("fidelidade", compact("fidelidade","clifor","criterio")); 
    }

    public function salvar(Request $dadosFormulario,Fidelidade $fidelidade, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $fidelidade->find($id);

                if($dadosFormulario['Usado'] == "1"){
                    $dados['Usado'] = $dados['Usado']; 
                } else{ 
                    $dados['Usado'] = 0;
                }

                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("FidelidadeController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $fidelidade->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("FidelidadeController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("FidelidadeController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function editar(Fidelidade $fidelidade, $id)
    {
        $fidelidade = $fidelidade->find($id);
        if(Gate::denies('view_fidelidade',$fidelidade)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        return view("edit.edit_fidelidade", compact("fidelidade","id","clifor"));
    }

    public function destroy($Codigo, Fidelidade $fidelidade)
    {
        $fidelidade->destroy($Codigo);

    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $fidelidade = Fidelidade::where( 'Cod_CliFor' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("fidelidade", compact("fidelidade","clifor","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $fidelidade = Fidelidade::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("fidelidade", compact("fidelidade","clifor","criterio")); 
    }
    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $clifor = CliFor::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $fidelidade = Fidelidade::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("fidelidade", compact("fidelidade","clifor","criterio")); 
    }
}
