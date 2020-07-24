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
        $criterio = "";
        return view("empresas", compact("empresas","funcionario","cond_pag","form_pag","transportadora","clifor",'user','criterio')); 
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
                $destinationPath = public_path('../../public_html/cidadesoft/storage/empresas');
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
            
            if($request['Cfg_PreviewRel'] == "1"){
                $data['Cfg_PreviewRel'] = $data['Cfg_PreviewRel']; 
            } else{ 
                $data['Cfg_PreviewRel'] = 0;
            }
             //dd($request['Cfg_PreviewRel']);

            if($request['Cfg_LembCliAniv'] == "1"){
                $data['Cfg_LembCliAniv'] = $data['Cfg_LembCliAniv']; 
            } else{ 
                $data['Cfg_LembCliAniv'] = 0;
            }

            if($request['Cfg_PesqCep'] == "1"){
                $data['Cfg_PesqCep'] = $data['Cfg_PesqCep']; 
            } else{ 
                $data['Cfg_PesqCep'] = 0;
            }

            if($request['Cfg_AtuPrecoPrazo'] == "1"){
                $data['Cfg_PesqCep'] = $data['Cfg_AtuPrecoPrazo']; 
            } else{ 
                $data['Cfg_AtuPrecoPrazo'] = 0;
            }

            if($request['Cfg_IdentChamada'] == "1"){
                $data['Cfg_IdentChamada'] = $data['Cfg_IdentChamada']; 
            } else{ 
                $data['Cfg_IdentChamada'] = 0;
            }

            if($request['Cfg_PermDuplicar'] == "1"){
                $data['Cfg_PermDuplicar'] = $data['Cfg_PermDuplicar']; 
            } else{ 
                $data['Cfg_PermDuplicar'] = 0;
            }

            if($request['SMTP_Seguro'] == "1"){
                $data['SMTP_Seguro'] = $data['SMTP_Seguro']; 
            } else{ 
                $data['SMTP_Seguro'] = 0;
            }

            if($request['SMTP_EmailCopia'] == "1"){
                $data['SMTP_EmailCopia'] = $data['SMTP_EmailCopia']; 
            } else{ 
                $data['SMTP_EmailCopia'] = 0;
            }

            if($request['Fin_ControlaCaixa'] == "1"){
                $data['Fin_ControlaCaixa'] = $data['Fin_ControlaCaixa']; 
            } else{ 
                $data['Fin_ControlaCaixa'] = 0;
            }

            if($request['Fin_ComiFrac'] == "1"){
                $data['Fin_ComiFrac'] = $data['Fin_ComiFrac']; 
            } else{ 
                $data['Fin_ComiFrac'] = 0;
            }

            if($request['Fin_ContrComi'] == "1"){
                $data['Fin_ContrComi'] = $data['Fin_ContrComi']; 
            } else{ 
                $data['Fin_ContrComi'] = 0;
            }

            if($request['Fisc_ICMSFixo'] == "1"){
                $data['Fisc_ICMSFixo'] = $data['Fisc_ICMSFixo']; 
            } else{ 
                $data['Fisc_ICMSFixo'] = 0;
            }

            if($request['NFe_Valida'] == "1"){
                $data['NFe_Valida'] = $data['NFe_Valida']; 
            } else{ 
                $data['NFe_Valida'] = 0;
            }

            if($request['Vend_PedSimp'] == "1"){
                $data['Vend_PedSimp'] = $data['Vend_PedSimp']; 
            } else{ 
                $data['Vend_PedSimp'] = 0;
            }

            if($request['Vend_AltPrTot'] == "1"){
                $data['Vend_AltPrTot'] = $data['Vend_AltPrTot']; 
            } else{ 
                $data['Vend_AltPrTot'] = 0;
            }

            if($request['Vend_ExibeEst'] == "1"){
                $data['Vend_ExibeEst'] = $data['Vend_ExibeEst']; 
            } else{ 
                $data['Vend_ExibeEst'] = 0;
            }

            if($request['Vend_FreteIncorp'] == "1"){
                $data['Vend_FreteIncorp'] = $data['Vend_FreteIncorp']; 
            } else{ 
                $data['Vend_FreteIncorp'] = 0;
            }

            if($request['Vend_AgrupaltPed'] == "1"){
                $data['Vend_AgrupaltPed'] = $data['Vend_AgrupaltPed']; 
            } else{ 
                $data['Vend_AgrupaltPed'] = 0;
            }

            if($request['Vend_BxEstOSOrc'] == "1"){
                $data['Vend_BxEstOSOrc'] = $data['Vend_BxEstOSOrc']; 
            } else{ 
                $data['Vend_BxEstOSOrc'] = 0;
            }

            if($request['Vend_MudaStatOS'] == "1"){
                $data['Vend_MudaStatOS'] = $data['Vend_MudaStatOS']; 
            } else{ 
                $data['Vend_MudaStatOS'] = 0;
            }

            if($request['Vend_BuscObs'] == "1"){
                $data['Vend_BuscObs'] = $data['Vend_BuscObs']; 
            } else{ 
                $data['Vend_BuscObs'] = 0;
            }

            if($request['Vend_ProgFide'] == "1"){
                $data['Vend_ProgFide'] = $data['Vend_ProgFide']; 
            } else{ 
                $data['Vend_ProgFide'] = 0;
            }

            if($request['Vend_FiltroIniMes'] == "1"){
                $data['Vend_FiltroIniMes'] = $data['Vend_FiltroIniMes']; 
            } else{ 
                $data['Vend_FiltroIniMes'] = 0;
            }
           

        if ($request->hasFile('Logo') && $request->file('Logo')->isValid()) { // existe imagem nova
                        
            $name = kebab_case($request->Nome_Fantasia).kebab_case($request->Razao_Social);//uniqid(date('HisYmd')); // Define um novo nome data atual (nunca dar nome duplicado e sobrescrever)
            $extension = $request->Logo->extension(); // Recupera a extensão do arquivo
            $nameFile = "{$name}.{$extension}"; // Define finalmente o nome
            
            //local
            $upload = $request->Logo->storeAs('empresas', $nameFile); // Faz o upload:

            /*
            //hospedagem
             $upload = $request->Logo;
                $destinationPath = public_path('../../public_html/cidadesoft/storage/empresas');
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

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $empresas = Empresa::where( 'Nome_Fantasia' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        $user = User::all();
        return view("empresas", compact("empresas","funcionario","cond_pag","form_pag","transportadora","clifor",'user','criterio')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $empresas = Empresa::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $funcionario = Funcionario::all();
        $cond_pag = Cond_Pag::all();
        $form_pag = Form_Pag::all();
        $transportadora = Transportadora::all();
        $clifor = CliFor::all();
        $user = User::all();
        return view("empresas", compact("empresas","funcionario","cond_pag","form_pag","transportadora","clifor",'user','criterio')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }
}
