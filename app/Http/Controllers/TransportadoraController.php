<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Transportadora;
use App\model\Transportadora_Destino;
use App\model\Transportadora_Valor;
use App\model\Empresa;
use Gate;
class TransportadoraController extends Controller
{
    public function listar(Transportadora $transportadora, Empresa $empresa)
    {
        //$transportadora = $transportadora->all();
        $transportadora = Transportadora::paginate(10);
        $empresa = Empresa::all();
        $criterio = "";
        return view("transportadoras", compact("transportadora","empresa",'criterio'));
    }
    public function salvar(Request $dadosFormulario, Transportadora $transportadora, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $transportadora->find($id);
                
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("TransportadoraController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {   
                $transportadora->create($dadosFormulario->all());
               //dd($dadosFormulario);
               //dd($id);
            }
            
            return redirect()
            ->action("TransportadoraController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");     
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("TransportadoraController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo, Transportadora $transportadora)
    {
        $transportadora->destroy($Codigo);
    }


    public function editar(Transportadora $transportadora, $id, Empresa $empresa)
    {
        
        $transportadora = $transportadora->find($id);
       
        if(Gate::denies('view_transp', $transportadora)){
            return redirect()->back();
        }
        if(Gate::denies('edita_transp', $transportadora)){
            return redirect()->back();
        }
        $empresa = Empresa::all();
        return view("edit.edit_transportadora", compact("transportadora","id","empresa"));
    }
    
    public function vizualizar(Transportadora $transportadora, $id,Transportadora_Destino $transportadora_destino,
        Transportadora_Valor $transportadora_valor)
    {
        $transportadora = $transportadora->find($id);
        if(Gate::denies('view_transp', $transportadora)){
            return redirect()->back();
        }
        $transportadora_destino = Transportadora_Destino::all();
        $transportadora_valor = Transportadora_Valor::all();
        return view("visual.view_transportadora", compact("transportadora","id","transportadora_destino","transportadora_valor"));
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $transportadora = Transportadora::where( 'Nome_Fantasia' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("transportadoras", compact("transportadora","empresa",'criterio'));

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $transportadora = Transportadora::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("transportadoras", compact("transportadora","empresa",'criterio'));

    }

}
