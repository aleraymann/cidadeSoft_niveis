@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ctas_pagas")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Conta: {{ $ctas_pagas->Num_Doc }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_ctas_pagas')      
        <a href='{{ url("/Contas_Pagas/editar/$ctas_pagas->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
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
                                <b class="ls-label-text">Número do Documento:</b>
                                    <label>{{ $ctas_pagas->Num_Doc }} </label><br> 
                                <b class="ls-label-text">Parcela:</b>
                                    <label>{{ $ctas_pagas->Parcela }} </label><br>
                                <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $ctas_pagas->Cod_Clifor }} </label><br>   
                                <b class="ls-label-text">Cod da Forma de Pagamento:</b>
                                    <label>{{ $ctas_pagas->Forma_Pag }} </label><br>   
                                <b class="ls-label-text">Cod da Condição de Pagamento:</b>
                                    <label>{{ $ctas_pagas->Cond_Pag }} </label><br>   
                                <b class="ls-label-text">Data de Pagamento:</b>
                                    <label>{{ $ctas_pagas->Data_Pagto }} </label><br> 
                                <b class="ls-label-text">Data Baixa:</b>
                                    <label>{{ $ctas_pagas->Data_Baixa }} </label><br>   
                                <b class="ls-label-text">Tipo de Pagamento:</b>
                                    <label>{{ $ctas_pagas->Tipo_Pag }} </label><br>   
                                <b class="ls-label-text">Valor que Originou a Conta:</b>
                                    <label>{{ $ctas_pagas->Valor_Origem }} </label><br>
                                <b class="ls-label-text">Valor efetivamente pago:</b>
                                    <label>{{ $ctas_pagas->Valor_Pago }} </label><br>
                                <b class="ls-label-text">Valor do saldo da dívida:</b>
                                    <label>{{ $ctas_pagas->Valor_Divida }} </label><br>
                                </td>
                                <td>
                                <b class="ls-label-text">Multa cobrada na baixa do tírulo:</b>
                                    <label>{{ $ctas_pagas->Multa }} </label><br>
                                <b class="ls-label-text">Juros cobrados na baixa do tírulo:</b>
                                    <label>{{ $ctas_pagas->Taxa_Juros }} </label><br>
                                <b class="ls-label-text">Desconto concedido na baixa do tírulo:</b>
                                    <label>{{ $ctas_pagas->Desconto }} </label><br>
                                <b class="ls-label-text">Local/Nota de origem:</b>
                                    <label>{{ $ctas_pagas->Origem }} </label><br>
                                <b class="ls-label-text">Local de Pagamento</b>
                                    <label>{{ $ctas_pagas->Local_Pag=="BCO"?"Banco":"Caixa" }}</label><br>
                                <b class="ls-label-text">Observações:</b>
                                    <label>{{ $ctas_pagas->Observacoes }} </label><br>
                                <b class="ls-label-text">Recido:</b>
                                    <label>{{ $ctas_pagas->Recibo }}</label><br>
                                <b class="ls-label-text">Cod do Plano de Contas:</b>
                                    <label>{{ $ctas_pagas->Plano_Ctas }} </label><br>
                                <b class="ls-label-text">Cod do Centro de Custo:</b>
                                    <label>{{ $ctas_pagas->Centro_Custo }} </label><br>
                                <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $ctas_pagas->Empresa }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
