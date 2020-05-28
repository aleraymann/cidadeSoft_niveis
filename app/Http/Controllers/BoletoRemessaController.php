<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\BoletoRemessa;
use App\model\BoletoTitulo;
use Gate;

class BoletoRemessaController extends Controller
{
    public function listar( BoletoRemessa $boleto_remessa)
    {  
        $boleto_remessa = $boleto_remessa->all();
        $boleto_remessa = BoletoRemessa::paginate(20);
        return view("boleto_remessa", compact("boleto_remessa")); 
    }
    public function salvar(Request $dadosFormulario, BoletoRemessa $boleto_remessa, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $boleto_remessa->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("BoletoRemessaController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $boleto_remessa->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("BoletoRemessaController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("BoletoRemessaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, BoletoRemessa $boleto_remessa)
    {
        $boleto_remessa->destroy($Codigo);
      
    }
    
    public function editar (BoletoRemessa $boleto_remessa, $id)
    {
        $boleto_remessa = $boleto_remessa->find($id);
        if(Gate::denies('view_boletoRem', $boleto_remessa)){
            return redirect()->back();
        }
        return view("edit.edit_boleto_remessa", compact("boleto_remessa","id"));
    }
}
