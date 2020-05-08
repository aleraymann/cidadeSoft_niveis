<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Form_Pag;
use App\model\Empresa;
use Gate;

class Form_PagController extends Controller
{
    public function listar(Form_Pag $form_pag)
    {
        if(Gate::denies('view_financeiro')){
            return redirect()->back();
        }
        $form_pag = $form_pag->all();
        $form_pag = Form_Pag::paginate(20);
        return view("form_pag", compact("form_pag"));
    }
    public function salvar(Request $dadosFormulario,Form_Pag $form_pag, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $form_pag->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("Form_PagController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $form_pag->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("Form_PagController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("Form_PagController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo, Form_Pag $form_pag)
    {
        $form_pag->destroy($Codigo);

    }

    public function editar(Form_Pag $form_pag, $id)
    {
        $form_pag = $form_pag->find($id);
        return view("edit.edit_form_pag", compact("form_pag","id"));
    }


}