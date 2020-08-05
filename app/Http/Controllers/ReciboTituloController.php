<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ReciboTitulo;
use App\model\Recibo;
use App\model\BoletoTitulo;
use Gate;

class ReciboTituloController extends Controller
{
    public function listar(ReciboTitulo $recibo_tit)
    {
        $recibo_tit = $recibo_tit->all();
        $recibo_tit = ReciboTitulo::paginate(20);
        $recibo = Recibo::all();
        $titulo = BoletoTitulo::all();
        $criterio = "";
        return view("recibo_titulo", compact("recibo_tit","titulo","recibo","criterio"));
    }

    public function salvar(Request $dadosFormulario,ReciboTitulo $recibo_tit, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $recibo_tit->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ReciboTituloController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $recibo_tit->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ReciboTituloController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ReciboTituloController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function destroy($Codigo,ReciboTitulo $recibo_tit)
    {
            $recibo_tit->destroy($Codigo);
    }

    public function editar(ReciboTitulo $recibo_tit, $id)
    {
        $recibo_tit = $recibo_tit->find($id);
        if(Gate::denies('view_recibo_tit',$recibo_tit)){
            return redirect()->back();
        }
        $recibo = Recibo::all();
        $titulo = BoletoTitulo::all();
        return view("edit.edit_recibo_titulo", compact("recibo_tit","id","recibo","titulo"));
    }


    public function busca( Request $request){
        $criterio  = "Cod do Título = " .$request->criterio;
        $recibo_tit = ReciboTitulo::where( 'Cod_Tit' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        $recibo = Recibo::all();
        $titulo = BoletoTitulo::all();
        return view("recibo_titulo", compact("recibo_tit","titulo","recibo","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $recibo = Recibo::all();
        $titulo = BoletoTitulo::all();
        $recibo_tit = ReciboTitulo::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("recibo_titulo", compact("recibo_tit","titulo","recibo","criterio")); 
    }

    public function busca3( Request $request){
        $criterio  = "Cod do Recibo = " . $request->criterio;
        $recibo = Recibo::all();
        $titulo = BoletoTitulo::all();
        $recibo_tit = ReciboTitulo::where( 'Cod_Rec' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("recibo_titulo", compact("recibo_tit","titulo","recibo","criterio")); 
    }

}
