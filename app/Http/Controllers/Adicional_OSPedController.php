<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Adicional_OSPed;
use Gate;

class Adicional_OSPedController extends Controller
{
    public function listar( Adicional_OSPed $adicional_osped)
    {  
        $adicional_osped = $adicional_osped->all();
        $adicional_osped = Adicional_OSPed::paginate(20);
        $criterio = "";
        return view("adicional_osped", compact("adicional_osped","criterio")); 
    }
    public function salvar(Request $dadosFormulario, Adicional_OSPed $adicional_osped, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $adicional_osped->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("Adicional_OSPedController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $adicional_osped->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("Adicional_OSPedController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("Adicional_OSPedController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo, Adicional_OSPed $adicional_osped)
    {
        $adicional_osped->destroy($Codigo);
    }
    
    public function editar (Adicional_OSPed $adicional_osped, $id)
    {
        $adicional_osped = $adicional_osped->find($id);
        if(Gate::denies('view_adiOS', $adicional_osped)){
            return redirect()->back();
        }
        return view("edit.edit_adicional_osped", compact("adicional_osped","id"));
    }

    public function busca( Request $request){
        $criterio  = $request->criterio;
        $adicional_osped = Adicional_OSPed::where( 'Descricao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("adicional_osped", compact("adicional_osped","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $adicional_osped = Adicional_OSPed::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("adicional_osped", compact("adicional_osped","criterio")); 
    }

}
