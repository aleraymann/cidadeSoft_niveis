@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a  href="{{ url()->previous() }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Movimento de Conta
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
    
                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Cod da Data do Movimento:</b>
                                    <label>{{ $conta_movimento->data_id }} </label><br> 
                                <b class="ls-label-text">Espécie:</b>
                                @if( $conta_movimento->Especie===1)
                                <label>Dinheiro </label><br>
                                @elseif( $conta_movimento->Especie===2)
                                <label> Cheque </label><br>
                                @else
                                <label> Cartão</label><br>
                                @endif
                                    
                                <b class="ls-label-text">Documento:</b>
                                @if( $conta_movimento->Documento==="REC")
                                <label>Recibo </label><br>
                                @else
                                <label> Nota Fiscal</label><br>
                                @endif
                              
                                <b class="ls-label-text">Numero do Documento:</b>
                                    <label> {{ $conta_movimento->Num_Doc }} </label><br>
                                
                                <b class="ls-label-text">Cliente:</b>
                                    <label>{{ $conta_movimento->Cod_Clifor }} - {{ $conta_movimento->Nome_Clifor }}</label><br>
                                <b class="ls-label-text">Histórico:</b>
                                    <label>{{ $conta_movimento->Historico }}</label><br>
                                <b class="ls-label-text">Valor:</b>
                                    <label>{{ $conta_movimento->Valor }}</label><br>
                                    <b class="ls-label-text">Operador:</b>
                                    @if( $conta_movimento->Operador==="C")
                                    <label>Crédito </label><br>
                                @else
                                    <label> Débito</label><br>
                                @endif
                                <b class="ls-label-text">Conta:</b>
                                    <label>Cod Conta: {{ $conta_movimento->Cod_Conta }} - Cod Saldo:{{ $conta_movimento->Cod_Conta_Saldo }} </label><br>
                                <b class="ls-label-text">Plano de Contas:</b>
                                    <label>{{ $conta_movimento->Plano_Ctas }}</label><br>
                                <b class="ls-label-text">Centro Custo:</b>
                                    <label>{{ $conta_movimento->Centro_Custo }}</label><br>
                                <b class="ls-label-text">Número da Transação:</b>
                                    <label>{{ $conta_movimento->Transacao }}</label><br>
                                <b class="ls-label-text">Empresa:</b>
                                    <label>{{ $conta_movimento->Empresa }}</label><br>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
