<?php

namespace App\Http\Controllers;
use App\model\CliForContato;
use App\model\CliFor;
use Gate;

use Illuminate\Http\Request;

class CliForContatoController extends Controller
{
    public function listar( CliForContato $clifor_contato, CliFor $clifor)
    {   $clifor = CliFor::all();
        return redirect(url()->previous());
        
    }

    public function update(Request $dadosFormulario, CliForContato $clifor_contato, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor_contato->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $clifor_contato->create($dadosFormulario->all());
               //dd($dadosFormulario);
            }
            
            return redirect()
            ->action("CliForContatoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CliForContatoController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function destroy($Codigo,  CliForContato $clifor_contato)
    { 
            $clifor_contato->destroy($Codigo);

    }

    public function edit( CliForContato $clifor_contato, $id, CliFor $clifor)
    {
        $clifor_contato = $clifor_contato->find($id);
        if (Gate::denies('view_clifor_contato', $clifor_contato)) {
            return redirect()->back();
        }
        $clifor = clifor::all();
        return view("edit.edit_clifor_contato", compact("clifor_contato","id","clifor"));
    }




}
