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
        return view("fluxo", compact("fluxo","conta","empresa")); 
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

}
