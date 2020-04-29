<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Funcionario;

class FuncionarioController extends Controller
{
    public function listar( Funcionario $funcionario)
    {  
        $funcionarios = $funcionario->all();
        $funcionario = Funcionario::paginate(20);
        return view("funcionarios", compact("funcionario")); 
    }


    public function salvar(Request $dadosFormulario, Funcionario $funcionario, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $funcionario->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $funcionario->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(Funcionario $funcionario, $id)
    {
        $funcionario = Funcionario::find($id);
        //$empresa = $empresa->find($id);
        $this->authorize('update_funcionario', $funcionario);
        return view("edit.edit_funcionarios", compact("funcionario","id"));
    }

    public function excluir($Codigo, Funcionario $funcionario)
    {
        $funcionario->destroy($Codigo);
    }

    public function vizualizar(Funcionario $funcionario, $id)
    {
        $funcionario = $funcionario->find($id);
        return view("visual.view_funcionarios", compact("funcionario","id"));
    }

}
