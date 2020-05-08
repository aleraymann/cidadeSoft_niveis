<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Empresa;
use App\model\Funcionario;
use App\model\Transportadora;
use App\model\CliFor;
use Gate;

use PDF;

class PDFController extends Controller
{
    public function gerar_empresas(){
        $empresas = Empresa::all();
        //dd($empresas);
        if(Gate::denies('gerar_relatorio')){
            return redirect()->back();
        }
        $empresas = PDF::loadView('pdf.pdf_empresas',compact('empresas'));
        return $empresas->setPaper('a4')->stream('Empresas.pdf');
    }

    public function gerar_funcionarios(){
        $funcionarios = Funcionario::all();
        if(Gate::denies('gerar_relatorio')){
            return redirect()->back();
        }
        $funcionarios = PDF::loadView('pdf.pdf_funcionarios',compact('funcionarios'));
        return $funcionarios->setPaper('a4')->stream('Funcionarios.pdf');
    }

    public function gerar_clifor(){
        $clifor = CliFor::all();
        if(Gate::denies('gerar_relatorio')){
            return redirect()->back();
        }
        $clifor = PDF::loadView('pdf.pdf_clifor',compact('clifor'));
        return $clifor->setPaper('a4')->stream('Clientes_Fornecedores.pdf');
    }
    public function gerar_transportadoras(){
        $transportadora = Transportadora::all();
        if(Gate::denies('gerar_relatorio')){
            return redirect()->back();
        }
        $transportadora = PDF::loadView('pdf.pdf_transportadoras',compact('transportadora'));
        return $transportadora->setPaper('a4')->stream('Transportadoras.pdf');
    }
}
