<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CliForEndereco;
use App\model\CliFor;
use Gate;

class CliForEnderecoController extends Controller
{
    public function listar( CliForEndereco $clifor_endereco, CliFor $clifor)
    {   $clifor = CliFor::all();
        return redirect(url()->previous());
        
    }
    public function update(Request $dadosFormulario, CliForEndereco $clifor_endereco, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor_endereco->find($id);
              
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $clifor_endereco->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CliForEnderecoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CliForEnderecoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function destroy($Codigo,  CliForEndereco $clifor_endereco)
    {
            $clifor_endereco->destroy($Codigo);
       
    }
    public function edit( CliForEndereco $clifor_endereco, $id, CliFor $clifor)
    {
        $clifor_endereco = $clifor_endereco->find($id);
        
        if (Gate::denies('view_clifor_endereco', $clifor_endereco)) {
            return redirect()->back();
        }
        $clifor = clifor::all();
        return view("edit.edit_clifor_endereco", compact("clifor_endereco","id","clifor"));
    }

}
