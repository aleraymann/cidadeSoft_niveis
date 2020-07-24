<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\model\CliFor;
use App\model\Funcionario;
use App\model\Empresa;
use App\model\CliForContato;
use App\model\CliForEndereco;
use App\model\CliForReferencia;
use App\model\BoletoTitulo;
use App\User;
use Gate;

class CliForController extends Controller
{
    public function listar( CliFor $clifor, Funcionario $vendedor, Empresa $empresa,User $user)
    {  
        //$clifor = $clifor->all();
      
        $clifor = CliFor::paginate(10);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        $criterio = "";
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio")); 
    }
    public function update(Request $dadosFormulario, CliFor $clifor, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor->find($id);
              
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {   
                //dd($dadosFormulario);
                $clifor->create($dadosFormulario->all());
               
               //dd($id);
            }
            
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");     
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            if(Gate::denies('view_clifor', $clifor)){
                return redirect()->back();
            }
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function destroy($Codigo, Clifor $clifor)
    { 
        if(Gate::denies('view_clifor', $clifor)){
        return redirect()->back();
    }
        $clifor->destroy($Codigo);
    }

    public function edit(CliFor $clifor, $id, Funcionario $vendedor, Empresa $empresa,User $user)
    {
        $clifor = $clifor->find($id);
        if(Gate::denies('view_clifor', $clifor)){
            return redirect()->back();
        }
        if(Gate::denies('edita_cliente')){
            return redirect()->back();
        }
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("edit.edit_clifor", compact("clifor","id","vendedor","empresa","user"));
    }
    public function view(CliFor $clifor, $id, CliForContato $clifor_contato, CliForEndereco $clifor_endereco, CliforReferencia $clifor_referencia)
    {
        
        $clifor = $clifor->find($id);
        if(Gate::denies('view_clifor', $clifor)){
            return redirect()->back();
        }
        $clifor_contato = CliForContato::all();
        $clifor_referencia = CliforReferencia::all();
        $clifor_endereco = CliForEndereco::all();
        return view("visual.view_clifor", compact("clifor","id","clifor_contato","clifor_endereco","clifor_referencia"));
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $clifor = CliFor::where( 'Nome_Fantasia' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $clifor = CliFor::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio")); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }
 
}
