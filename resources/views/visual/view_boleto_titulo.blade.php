@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Num do Título no Sistema: {{ $boleto_titulo->Nro_Doc }}
                </h4>
                <div class="btn-group" role="group">
                @can('edita_boletoTit')
        <a href='{{ url("/Boleto_titulo/editar/$boleto_titulo->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
            @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Dados do Boleto</th>
                                <th class="">Mensagens e Instruções</th>
                                <th class="">Multa, Juros, Acrescimo e Desconto</th>
                                <th class="">Dados do Adicionais</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Baixa/Envio:</b>
                                    <label>{{ $boleto_titulo->Sel==1?"Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Código da Conta:</b>
                                    <label>{{ $boleto_titulo->Cod_Conta }} </label><br>
                                    <b class="ls-label-text">Data do Documento:</b>
                                    <label>{{ $boleto_titulo->Data_Doc }} </label><br>
                                    <b class="ls-label-text">Vencimento:</b>
                                    <label>{{ $boleto_titulo->Vencimento }} </label><br>
                                    <b class="ls-label-text">Numero do Documento no Sistema:</b>
                                    <label>{{ $boleto_titulo->Nro_Doc }} </label><br>
                                    <b class="ls-label-text">Número do Título no Banco:</b>
                                    <label>{{ $boleto_titulo->Nosso_Num }} </label><br>
                                    <b class="ls-label-text">Valor:</b>
                                    <label>{{ $boleto_titulo->Valor }} </label><br>
                                    <b class="ls-label-text">Data Baixa:</b>
                                    <label>{{ $boleto_titulo->Data_Bai }} </label><br>
                                    <b class="ls-label-text">Data Liquidação:</b>
                                    <label>{{ $boleto_titulo->Data_Liq }} </label><br>
                                    <b class="ls-label-text">Situaçao:</b>
                                    @if( $boleto_titulo->Situacao =="C" )
                                        <label>{{ $boleto_titulo->Situacao = "Carteira" }}
                                        </label><br>
                                            @elseif( $boleto_titulo->Situacao =="B" )
                                        <label>{{ $boleto_titulo->Situacao = "Baixado" }}
                                        </label><br>
                                            @elseif( $boleto_titulo->Situacao =="L" )
                                        <label>{{ $boleto_titulo->Situacao = "Liquidado" }}
                                        </label><br>
                                    @else
                                        <label>{{ $boleto_titulo->Situacao = "Vencido" }}
                                        </label><br>
                                    @endif
                                </td>
                                <td>
                                    <b class="ls-label-text">Mensagem a ser Impressa 1:</b>
                                    <label>{{ $boleto_titulo->Msg_1 }} </label><br>
                                    <b class="ls-label-text">Mensagem a ser Impressa 3:</b>
                                    <label>{{ $boleto_titulo->Msg_2 }} </label><br>
                                    <b class="ls-label-text">Mensagem a ser Impressa 3:</b>
                                    <label>{{ $boleto_titulo->Msg_3 }} </label><br>
                                    <b class="ls-label-text">Instrução de cobrança 1:</b>
                                    <label>{{ $boleto_titulo->Inst_1 }} </label><br>
                                    <b class="ls-label-text">Instrução de cobrança 2:</b>
                                    <label>{{ $boleto_titulo->Inst_2 }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Multa:</b>
                                    <label>{{ $boleto_titulo->Multa }} </label><br>
                                    <b class="ls-label-text">Juros:</b>
                                    <label>{{ $boleto_titulo->Taxa_Juros }} </label><br>
                                    <b class="ls-label-text">Acréscimo:</b>
                                    <label>{{ $boleto_titulo->Acrescimo }} </label><br>
                                    <b class="ls-label-text">Desconto:</b>
                                    <label>{{ $boleto_titulo->Desconto }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Cod Cliente:</b>
                                    <label>{{ $boleto_titulo->Cod_CliFor }} </label><br>
                                    <b class="ls-label-text">Cod NF:</b>
                                    <label>{{ $boleto_titulo->Cod_NF }} </label><br>
                                    <b class="ls-label-text">Cod Contas a Receber:</b>
                                    <label>{{ $boleto_titulo->Cod_CtaRec }} </label><br>
                                    <b class="ls-label-text">Cod Remessa:</b>
                                    <label>{{ $boleto_titulo->Cod_Rem }} </label><br>
                                    <b class="ls-label-text">Transação:</b>
                                    <label>{{ $boleto_titulo->Transacao }} </label><br>
                                    <b class="ls-label-text">Cod. Empresa:</b>
                                    <label>{{ $boleto_titulo->Empresa }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
