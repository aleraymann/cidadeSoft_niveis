<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\model\CliFor;
use App\model\Funcionario;
use App\model\Empresa;
use App\model\CliForContato;
use App\model\CliForEndereco;
use App\model\CliForReferencia;
use App\model\BoletoTitulo;
use DB;

class CliForController extends Controller
{
    public function listar( CliFor $clifor, Funcionario $vendedor, Empresa $empresa)
    {  
        //$clifor = $clifor->all();
        $clifor = CliFor::paginate(20);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        return view("clifor", compact("clifor","vendedor","empresa")); 
    }
    public function salvar(Request $dadosFormulario, CliFor $clifor, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {   
                $clifor->create($dadosFormulario->all());
               //dd($dadosFormulario);
               //dd($id);
            }
            
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");     
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, Clifor $clifor)
    {
        $clifor->destroy($Codigo);
    }

    public function editar(CliFor $clifor, $id, Funcionario $vendedor, Empresa $empresa)
    {
        $clifor = $clifor->find($id);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        return view("edit.edit_clifor", compact("clifor","id","vendedor","empresa"));
    }
    public function vizualizar(CliFor $clifor, $id, CliForContato $clifor_contato, CliForEndereco $clifor_endereco, CliforReferencia $clifor_referencia)
    {
        $clifor = $clifor->find($id);
        $clifor_contato = CliForContato::all();
        $clifor_referencia = CliforReferencia::all();
        $clifor_endereco = CliForEndereco::all();
        return view("visual.view_clifor", compact("clifor","id","clifor_contato","clifor_endereco","clifor_referencia"));
    }
 
}
