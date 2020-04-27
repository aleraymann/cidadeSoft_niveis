<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Transportadora_Valor;
use App\model\Transportadora;

class Transportadora_ValorController extends Controller
{
    public function listar(Transportadora_Valor $transportadora_valor, Transportadora $transportadora)
    {   $transportadora = Transportadora::all();
        return redirect(url()->previous());
        
    }
    public function salvar(Request $dadosFormulario,  Transportadora_Valor $transportadora_valor, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $transportadora_valor->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("TransportadoraController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $transportadora_valor->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect(url()->previous())
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("Transportadora_ValorController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo,  Transportadora_Valor $transportadora_valor)
    {
            $transportadora_valor->destroy($Codigo);
     
    }
    public function editar(  Transportadora_Valor $transportadora_valor, $id,  Transportadora $transportadora)
    {
        $transportadora_valor = $transportadora_valor->find($id);
        $transportadora = Transportadora::all();
        return view("edit.edit_transp_valor", compact("transportadora_valor","id","transportadora"));
    }
}
