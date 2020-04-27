<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\CEST;
use App\model\NCM;

class CESTController extends Controller
{
    public function listar(CEST $cest, NCM $ncm)
    {
        $cest = $cest->all();
        $cest = CEST::paginate(20);
        $ncm = NCM::all();
        return view("cest", compact("cest","ncm"));
    }
    public function salvar(Request $dadosFormulario,CEST $cest, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $cest->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CESTController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $cest->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("CESTController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("CESTController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo, CEST $cest)
    {
            $cest->destroy($Codigo);
    }

    public function editar(CEST $cest, $id,  NCM $ncm)
    {
        $cest = $cest->find($id);
        $ncm = NCM::all();
        return view("edit.edit_cest", compact("cest","id","ncm"));
    }


}
