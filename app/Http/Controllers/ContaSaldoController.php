<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContaSaldo;
use App\model\Empresa;
use App\model\ContaCadastro;


class ContaSaldoController extends Controller
{
    public function listar( ContaSaldo $contasaldo, Empresa $empresa, ContaCadastro $contacadastro)
    
    {  
        $contasaldo = $contasaldo->all();
        $empresa = Empresa::all();
        return redirect(url()->previous());
    }
    public function salvar(Request $dadosFormulario, ContaSaldo $contasaldo, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $contasaldo->find($id);
                $dados->update($contasaldo->all());
                return redirect()
                ->action("ContaCadastroController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $contasaldo->create($dadosFormulario->all());
            }
            
            return redirect(url()->previous())
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ContaCadastroController@listar")
            ->with("toast_error", "Registro Salvo com sucesso");
        }

    }
    public function excluir($Codigo,  ContaSaldo $contasaldo)
    {
            $contasaldo->destroy($Codigo);
    }
}
