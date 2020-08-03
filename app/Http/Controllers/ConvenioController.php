<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Convenio;
use Gate;

class ConvenioController extends Controller
{
    public function listar( Convenio $convenio)
    {  
        $convenio = $convenio->all();
        $convenio = Convenio::paginate(20);
        $criterio = "";
        return view("convenio", compact("convenio","criterio")); 
    }

    public function salvar(Request $dadosFormulario, Convenio $convenio, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $convenio->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ConvenioController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $convenio->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ConvenioController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ConvenioController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(Convenio $convenio, $id)
    {
        $convenio = $convenio->find($id);
        if(Gate::denies('view_convenio',$convenio)){
            return redirect()->back();
        }
        return view("edit.edit_convenio", compact("convenio","id"));
    }


    public function destroy($Codigo, Convenio $convenio)
    {
        $convenio->destroy($Codigo);
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $convenio = Convenio::where( 'Convenio' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("convenio", compact("convenio","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $convenio = Convenio::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("convenio", compact("convenio","criterio")); 
    }

}
