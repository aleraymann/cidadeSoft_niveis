<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\InventarioItem;
use App\model\Inventario;
use Gate;

class InventarioItemController extends Controller
{
    public function listar( InventarioItem $inventario_item)
    
    {  
        $inventario_item = $inventario_item->all();
        return view('inventario',compact('inventario_item'));
       
    }
    public function salvar(Request $dadosFormulario,InventarioItem $inventario_item, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $inventario_item->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("InventarioController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $inventario_item->create($dadosFormulario->all());
            }
            
            return redirect(url()->previous())
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect(url()->previous())
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }

    public function editar(InventarioItem $inventario_item, $id)
    {
        $inventario_item = $inventario_item->find($id);
        if(Gate::denies('view_invent_item',$inventario_item)){
            return redirect()->back();
        }
        return view("edit.edit_inventario_item", compact("inventario_item","id"));
    }

    public function visualizar(InventarioItem $inventario_item, $id)
    {
        $inventario_item = InventarioItem::find($id);
        if(Gate::denies('view_invent_item', $inventario_item)){
            return redirect()->back();
        }
        return view("visual.view_inventario_item", compact("id", "inventario_item"));
    }
    
    public function excluir($Codigo, InventarioItem $inventario_item)
    {
        $inventario_item->destroy($Codigo);
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        
        $inventario_item = InventarioItem::where( 'Cod_Item' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("busca_invent_item", compact("inventario_item","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
       
        $inventario_item = InventarioItem::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_invent_item", compact("inventario_item","criterio")); 
    }
    public function busca( Request $request){
        $criterio  = $request->criterio;
        $inventario_item = InventarioItem::where( 'Cod_Ref' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_invent_item", compact("inventario_item","criterio")); 
    }


}
