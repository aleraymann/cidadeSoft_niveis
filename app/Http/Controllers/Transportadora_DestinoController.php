<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Transportadora_Destino;
use App\model\Transportadora;
use Gate;

class Transportadora_DestinoController extends Controller
{
    
    public function listar(Transportadora_Destino $transportadora_destino, Transportadora $transportadora)
    {   $transportadora = Transportadora::all();
        return redirect(url()->previous());
        
    }

    public function salvar(Request $dadosFormulario,  Transportadora_Destino $transportadora_destino, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
               
                $dados = $transportadora_destino->find($id);
               
                if (Gate::denies('edita_transp')) {
                    return redirect()->back();
                }
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("TransportadoraController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $transportadora_destino->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect(url()->previous())
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("Transportadora_DestinoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo,  Transportadora_Destino $transportadora_destino)
    {
        if (Gate::denies('deleta_transp')) {
            return redirect()->back();
        }
        $transportadora_destino->destroy($Codigo);
    }
    public function editar( Transportadora_Destino $transportadora_destino, $id,  Transportadora $transportadora)
    {
        $transportadora_destino = $transportadora_destino->find($id);
        if (Gate::denies('view_transp_destino', $transportadora_destino)) {
            return redirect()->back();
        }
        if (Gate::denies('edita_transp')) {
            return redirect()->back();
        }
        $transportadora = Transportadora::all();
        return view("edit.edit_transp_destino", compact("transportadora_destino","id","transportadora"));
    }
}
