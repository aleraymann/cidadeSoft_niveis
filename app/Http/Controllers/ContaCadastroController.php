<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContaCadastro;
use App\model\Empresa;
use App\model\ContaSaldo;
use App\model\BoletoTitulo;


class ContaCadastroController extends Controller
{
    public function listar( ContaCadastro $contacadastro, Empresa $empresa)
    {  
        $contacadastro = $contacadastro->all();
        $contacadastro = ContaCadastro::paginate(20);
        $empresa = Empresa::all();
        return view("conta_cadastro", compact("contacadastro","empresa")); 
    }
    public function salvar(Request $dadosFormulario, ContaCadastro $contacadastro, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $contacadastro->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContaCadastroController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $contacadastro->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContaCadastroController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("ContaCadastroController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }

    }
    public function excluir($Codigo,  ContaCadastro $contacadastro)
    {
      
            $contacadastro->destroy($Codigo);
      
    }

    public function editar(ContaCadastro $contacadastro, Empresa $empresa, $id)
    {
        $contacadastro = $contacadastro->find($id);
        $empresa = Empresa::all();
        return view("edit.edit_conta_cadastro", compact("contacadastro","empresa","id"));
    }
    
    public function vizualizar(ContaCadastro $contacadastro, $id, ContaSaldo $contasaldo)
    {
        $contacadastro = $contacadastro->find($id);
        $contasaldo = ContaSaldo::all();
        return view("visual.view_conta_cadastro", compact("contacadastro","id","contasaldo"));
    }


}
