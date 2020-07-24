<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Inventario;
use Gate;

class InventarioController extends Controller
{
    public function listar( Inventario $inventario)
    
    {  
        $inventario = $inventario->all();
       
        return view('inventario',compact('inventario'));
       
    }
    public function salvar(Request $dadosFormulario, Inventario $inventario, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $inventario->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("InventarioController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $inventario->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("InventarioController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("InventarioController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function editar(Inventario $inventario, $id)
    {
        $inventario = $inventario->find($id);
        if(Gate::denies('view_inventario',$inventario)){
            return redirect()->back();
        }
        return view("edit.edit_inventario", compact("inventario","id"));
    }

    public function visualizar(Inventario $inventario, $id)
    {
        $inventario = Inventario::find($id);
        if(Gate::denies('view_inventario', $inventario)){
            return redirect()->back();
        }
        return view("visual.view_inventario", compact("inventario","id"));
    }
}
