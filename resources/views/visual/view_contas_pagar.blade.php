@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ctas_pagar")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Conta a Pagar Num: {{ $ctas_pagar->Num_Doc }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_ctas_pagar')      
        <a href='{{ url("/Contas_Pagar/editar/$ctas_pagar->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
            <i class='far fa-edit'></i>
        </a>
          @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Conta</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Baixado?</b>
                                    <label>{{ $ctas_pagar->Sel==1?"Sim":"Não" }}</label><br>
                                <b class="ls-label-text">Número do Documento:</b>
                                    <label>{{ $ctas_pagar->Num_Doc }} </label><br> 
                                <b class="ls-label-text">Parcela:</b>
                                    <label>{{ $ctas_pagar->Parcela }} </label><br>
                                <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $ctas_pagar->Cod_Clifor }} </label><br>   
                                <b class="ls-label-text">Cod da Forma de Pagamento:</b>
                                    <label>{{ $ctas_pagar->Forma_Pag }} </label><br>   
                                <b class="ls-label-text">Cod da Condição de Pagamento:</b>
                                    <label>{{ $ctas_pagar->Cond_Pag }} </label><br>   
                                <b class="ls-label-text">Data de Entrada:</b>
                                    <label>{{ $ctas_pagar->Data_Entrada }} </label><br> 
                                <b class="ls-label-text">Vencimento:</b>
                                    <label>{{ $ctas_pagar->Vencimento }} </label><br>   
                                <b class="ls-label-text">Data para Cobrança de Juros:</b>
                                    <label>{{ $ctas_pagar->Data_Juros }} </label><br>   
                                <b class="ls-label-text">Valor que Originou a Conta:</b>
                                    <label>{{ $ctas_pagar->Valor_Origem }} </label><br>
                                <b class="ls-label-text">Valor que se encontra a dívida:</b>
                                    <label>{{ $ctas_pagar->Valor_Divida }} </label><br>
                                <b class="ls-label-text">Multa a ser aplicada em caso de atraso:</b>
                                    <label>{{ $ctas_pagar->Multa }} </label><br>
                                <b class="ls-label-text">Juros a ser aplicado em caso de atraso:</b>
                                    <label>{{ $ctas_pagar->Taxa_Juros }} </label><br>
                                    <b class="ls-label-text">Desconto a ser concedido:</b>
                                    <label>{{ $ctas_pagar->Desconto }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Juros a ser concedido:</b>
                                    <label>{{ $ctas_pagar->Juros }} </label><br>
                                    <b class="ls-label-text">Divida Estimada com cálculos de juros:</b>
                                    <label>{{ $ctas_pagar->Divida_Estimada }} </label><br>
                                    <b class="ls-label-text">Local/Nota que originou a conta:</b>
                                    <label>{{ $ctas_pagar->Origem }} </label><br>
                                    <b class="ls-label-text">Local de Pagamento</b>
                                    <label>{{ $ctas_pagar->Local_Pag=="BCO"?"Banco":"Caixa" }}</label><br>
                                    <b class="ls-label-text">Observações:</b>
                                    <label>{{ $ctas_pagar->Observacoes }} </label><br>
                                    <b class="ls-label-text">Boleto:</b>
                                    <label>{{ $ctas_pagar->Cod_Boleto }} - Num no Sistema:  {{ $ctas_pagar->Nosso_Numero }}</label><br>
                                    <b class="ls-label-text">linha Digitável:</b>
                                    <label>{{ $ctas_pagar->Linha_Digitavel }} </label><br>
                                    <b class="ls-label-text">NF:</b>
                                    <label>{{ $ctas_pagar->NF }} </label><br>
                                    <b class="ls-label-text">Crédito do Cliente/Fornecedor?</b>
                                    <label>{{ $ctas_pagar->Credito==1?"Sim":"Não" }}</label><br>
                                    <b class="ls-label-text">Transaçao Financeira:</b>
                                    <label>{{ $ctas_pagar->Transacao }} </label><br>
                                    <b class="ls-label-text">Cod do Plano de Contas:</b>
                                    <label>{{ $ctas_pagar->Plano_Ctas }} </label><br>
                                    <b class="ls-label-text">Cod do Centro de Custo:</b>
                                    <label>{{ $ctas_pagar->Centro_Custo }} </label><br>
                                    <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $ctas_pagar->Empresa }} </label><br>
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
