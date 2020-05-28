<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\NCM;
use App\model\CEST;
use Gate;

class NCMController extends Controller
{
    public function listar(NCM $ncm)
    {
        $ncm = $ncm->all();
        $ncm = NCM::paginate(20);
        return view("ncm", compact("ncm"));
    }
    public function salvar(Request $dadosFormulario,NCM $ncm, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ncm->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("NCMController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ncm->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("NCMController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("NCMController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo, NCM $ncm)
    {
            $ncm->destroy($Codigo);
    }

    public function editar(NCM $ncm, $id)
    {
        $ncm = $ncm->find($id);
        if(Gate::denies('view_ncm',$ncm)){
            return redirect()->back();
        }
        return view("edit.edit_ncm", compact("ncm","id"));
    }


}
