<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use App\model\Empresa;
use App\model\Funcionario;
use App\model\Cond_Pag;
use App\model\Form_Pag;
use App\model\Transportadora;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\ContaSaldo;
use Gate;

class EmpresaController extends Controller
{
    public function listar( Empresa $empresa, Funcionario $funcionario, Cond_Pag $cond_pag,Form_Pag $form_pag ,
        Transportadora $transportadora,CliFor $clifor)
    {  
        $empresas = $empresa->all();
        $empresas = Empresa::paginate(20);
        //$empresas = $empresa->where('user_id', auth()->user()->id)->paginate(20);
        //dd($empresas);
        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        return view("empresas", compact("empresas","funcionario","cond_pag","form_pag","transportadora","clifor")); 
    }

    public function salvar(Request $dadosFormulario, Empresa $empresa, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
                $dados = $empresa->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("EmpresaController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $empresa->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, Empresa $empresa)
    {
        $empresa->destroy($Codigo);
    }

    public function editar(Empresa $empresa, $id, Funcionario $funcionario,Cond_Pag $cond_pag,Form_Pag $form_pag,
       Transportadora $transportadora,CliFor $clifor)
    {
        //return 'update';
        $empresa = Empresa::find($id);
        //$empresa = $empresa->find($id);
        //$this->authorize('update_empresa', $empresa);
        if(Gate::denies('update_empresa', $empresa)){
            return redirect()->back();
        }
        if(Gate::denies('edita_empresa')){
            return redirect()->back();
        }

        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        return view("edit.edit_empresas", compact("empresa","id","funcionario","cond_pag","form_pag","transportadora","clifor"));
    }

    public function vizualizar(Empresa $empresa, $id)
    {
        $empresa = Empresa::find($id);
        //$empresa = $empresa->find($id);
        //$this->authorize('view_empresa', $empresa);
        if(Gate::denies('view_empresa', $empresa)){
            return redirect()->back();
        }
        return view("visual.view_empresas", compact("empresa","id"));
    }
}
