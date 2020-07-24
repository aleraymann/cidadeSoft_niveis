<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Funcionario;
use Gate;

class FuncionarioController extends Controller
{
    public function listar( Funcionario $funcionario)
    {  
       // $this->authorize('insere_func', $funcionario);
        if(Gate::denies('insere_func')){
            return redirect()->back();
        }
        $funcionarios = $funcionario->all();
        $funcionario = Funcionario::paginate(10);
        $criterio = "";
        return view("funcionarios", compact("funcionario",'criterio')); 
    }


    public function update(Request $dadosFormulario, Funcionario $funcionario, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $funcionario->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $funcionario->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function edit(Funcionario $funcionario, $id)
    {
        $funcionario = Funcionario::find($id);
        //$empresa = $empresa->find($id);
        //$this->authorize('update_funcionario', $funcionario);
        if(Gate::denies('update_funcionario',$funcionario)){
            return redirect()->back();
        }
        return view("edit.edit_funcionarios", compact("funcionario","id"));
    }

    public function destroy($Codigo, Funcionario $funcionario)
    {
        $funcionario->destroy($Codigo);
    }

    public function view(Funcionario $funcionario, $id)
    {
        $funcionario = $funcionario->find($id);
        if(Gate::denies('update_funcionario',$funcionario)){
            return redirect()->back();
        }
        return view("visual.view_funcionarios", compact("funcionario","id"));
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $funcionario = Funcionario::where('Nome', 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        return view("funcionarios", compact("funcionario",'criterio')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }

    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $funcionario = Funcionario::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        return view("funcionarios", compact("funcionario",'criterio')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }

}
