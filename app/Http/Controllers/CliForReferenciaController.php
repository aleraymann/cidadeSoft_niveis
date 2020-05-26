<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CliForReferencia;
use App\model\CliFor;
use Gate;
class CliForReferenciaController extends Controller
{
 
    public function listar( CliForReferencia $clifor_referencia, CliFor $clifor)
    {   $clifor = CliFor::all();
        return redirect(url()->previous());
        
    }
    public function update(Request $dadosFormulario, CliForReferencia $clifor_referencia, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor_referencia->find($id);
               
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $clifor_referencia->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("CliForReferenciaController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CliForReferenciaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function edit( CliForReferencia $clifor_referencia, $id, CliFor $clifor)
    {
        $clifor_referencia = $clifor_referencia->find($id);
        if (Gate::denies('view_clifor_referencia', $clifor_referencia)) {
            return redirect()->back();
        }
        $clifor = clifor::all();
        return view("edit.edit_clifor_referencia", compact("clifor_referencia","id","clifor"));
    }

    public function destroy($Codigo, CliForReferencia $clifor_referencia)
    {
            $clifor_referencia->destroy($Codigo);
      
    }
}
