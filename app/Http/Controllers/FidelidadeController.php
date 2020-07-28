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
        return view("fidelidade", compact("fidelidade","clifor")); 
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
}
