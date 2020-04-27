<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Adicional_OSPed;

class Adicional_OSPedController extends Controller
{
    public function listar( Adicional_OSPed $adicional_osped)
    {  
        $adicional_osped = $adicional_osped->all();
        $adicional_osped = Adicional_OSPed::paginate(20);
        return view("adicional_osped", compact("adicional_osped")); 
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
        return view("edit.edit_adicional_osped", compact("adicional_osped","id"));
    }
}
