<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use App\model\Empresa;
use App\model\Funcionario;
use App\model\Cond_Pag;
use App\model\Form_Pag;
use App\model\Transportadora;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\ContaSaldo;
use app\User;
use Gate;

class EmpresaController extends Controller
{
    public function listar( Empresa $empresa, Funcionario $funcionario, Cond_Pag $cond_pag,Form_Pag $form_pag ,
        Transportadora $transportadora,CliFor $clifor)
    {  
        $empresas = $empresa->all();
        $empresas = Empresa::paginate(10);
        //$empresas = $empresa->where('user_id', auth()->user()->id)->paginate(20);
        //dd($empresas);
        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        $user = User::all();
        return view("empresas", compact("empresas","funcionario","cond_pag","form_pag","transportadora","clifor",'user')); 
    }

    public function store(Request $request, Empresa $empresa)
    {
        //dd($request->Logo);
        try {
            $data = $request->all();
            $data['Cfg_DataUltExec']  = date('Y-m-d', strtotime($data['Cfg_DataUltExec']));
            $data['Cfg_Ultbackup']  = date('Y-m-d', strtotime($data['Cfg_Ultbackup']));
            
                if ($request->hasFile('Logo') && $request->file('Logo')->isValid()) {
                
                $name = kebab_case($request->Nome_Fantasia).kebab_case($request->Razao_Social); //uniqid(date('HisYmd')); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
                $extension = $request->Logo->extension(); // Recupera a extensão do arquivo
                $nameFile = "{$name}.{$extension}"; // Define finalmente o nome

                //local
                $upload = $request->Logo->storeAs('empresas', $nameFile); // Faz o upload:

                 /*
            //hospedagem
             $upload = $request->Logo;
                $destinationPath = public_path('../public_html/cidadesoft/storage/empresas');
                $upload->move($destinationPath, $nameFile); // Faz o upload:
            */
                $data['Logo'] = $nameFile; // coloca no array q vc vai criar

                    if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORAGE
                        return redirect()
                    ->action("EmpresaController@listar")
                    ->with("toast_error", "Houve um erro ao gravar o Imagem");
                    }
                }
            
                 $empresa->create($data);
                 return redirect()
                ->action("EmpresaController@listar")
                ->with("toast_success", "Registro Gravado Com Sucesso");
        }
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function update(Request $request, Empresa $empresa, $id)
    {
        //dd($request->Logo);
        try {
            $dados = $empresa->find($id);
            $data = $request->all();

        if ($request->hasFile('Logo') && $request->file('Logo')->isValid()) { // existe imagem nova
                        
            $name = kebab_case($request->Nome_Fantasia).kebab_case($request->Razao_Social);//uniqid(date('HisYmd')); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
            $extension = $request->Logo->extension(); // Recupera a extensão do arquivo
            $nameFile = "{$name}.{$extension}"; // Define finalmente o nome
            
            //local
            $upload = $request->Logo->storeAs('empresas', $nameFile); // Faz o upload:

            /*
            //hospedagem
             $upload = $request->Logo;
                $destinationPath = public_path('../public_html/cidadesoft/storage/empresas');
                $upload->move($destinationPath, $nameFile); // Faz o upload:
            */

            $data['Logo'] = $nameFile; 
            if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORANGE
              return redirect()
                ->action("EmpresaController@listar")
                ->with("toast_error", "Houve um erro ao gravar o Imagem");
            }

        }else{// se cair aqui, continua a imagem q estava no banco já 
            $data['Logo'] = $request->LogoBanco;  
        }
        //dd($data); // Confere os dados que estaram passando para o update
         $empresa->find($id)->update($data); // grava todos os conteudos automativo

            return redirect() // SE CHEGOU AQUI, DADOS ATUALIZADOS COM SUCESSO
            ->action("EmpresaController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
                
            
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return redirect()
            ->action("EmpresaController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    } 

    public function destroy($Codigo, Empresa $empresa)
    {
        $empresa->destroy($Codigo);
    }

    public function edit(Empresa $empresa, $id, Funcionario $funcionario,Cond_Pag $cond_pag,Form_Pag $form_pag,
       Transportadora $transportadora,CliFor $clifor)
    {
        //return 'update';
        $empresa = Empresa::find($id);
        //$empresa = $empresa->find($id);
        //$this->authorize('update_empresa', $empresa);
        if(Gate::denies('view_empresa', $empresa)){
            return redirect()->back();
        }
        if(Gate::denies('edita_empresa')){
            return redirect()->back();
        }

        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        $user = User::all();
        return view("edit.edit_empresas", compact("empresa","id","funcionario","cond_pag","form_pag","transportadora","clifor", 'user'));
    }

    public function view(Empresa $empresa, $id)
    {
        $empresa = Empresa::find($id);
        //$empresa = $empresa->find($id);
        //$this->authorize('view_empresa', $empresa);
        if(Gate::denies('view_empresa', $empresa)){
            return redirect()->back();
        }
        return view("visual.view_empresas", compact("empresa","id"));
    }
}
