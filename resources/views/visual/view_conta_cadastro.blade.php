@extends("template")

@section("conteudo")
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
      @include('sweetalert::alert')
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url()->previous() }}"class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Conta: {{ $contacadastro->CC }}-{{ $contacadastro->Digito }} 
                <br> Banco: {{ $contacadastro->Nome_Banco }}</h4>
                <div class="btn-group " role="group">
                @can('edita_conta')
        <a href='{{ url("/Conta/editar/$contacadastro->Codigo") }}'
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
                                <th>Dados Adicionais</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>

                                <td>
                                    <b class="ls-label-text">Descrição:</b>
                                    <label>{{ $contacadastro->Descricao }} </label><br>
                                    <b class="ls-label-text">Número do Banco:</b>
                                    <label>{{ $contacadastro->Cod_Banco }} </label><br>
                                    <b class="ls-label-text">Dígito do Banco:</b>
                                    <label>{{ $contacadastro->Dig_Banco }} </label><br>
                                    <b class="ls-label-text">Nome do Banco:</b>
                                    <label>{{ $contacadastro->Nome_Banco }} </label><br>
                                    <b class="ls-label-text">Número do Banco Cobrador:</b>
                                    <label>{{ $contacadastro->Cod_Banco_Cob }} </label><br>
                                    <b class="ls-label-text">Dígito do Banco Cobrador:</b>
                                    <label>{{ $contacadastro->Dig_Banco_Cob }} </label><br>
                                    <b class="ls-label-text">Município:</b>
                                    <label>{{ $contacadastro->Praca }} </label><br>
                                    <b class="ls-label-text">Agência:</b>
                                    <label>{{ $contacadastro->Cod_Age }}-{{ $contacadastro->Dig_Age }} </label><br>
                                    <b class="ls-label-text">Conta:</b>
                                    <label>{{ $contacadastro->CC }}-{{ $contacadastro->Digito }} </label><br>
                                    <b class="ls-label-text">Tipo da Conta:</b>
                                    <label>{{ $contacadastro->Tipo_Conta=="C"?"Caixa":"Banco" }}
                                    </label><br>
                                    <b class="ls-label-text">Tipo da Cobrança:</b>
                                    <label>{{ $contacadastro->Tipo_Cobranca }} </label><br>
                                    <b class="ls-label-text">Códido do Cedente do Boleto:</b>
                                    <label>{{ $contacadastro->Cod_Cedente }} </label><br>
                                    <b class="ls-label-text">Número de Convenio de Cobrança:</b>
                                    <label>{{ $contacadastro->Convenio }} </label><br>
                                    <b class="ls-label-text">Número de Carteira de Cobrança:</b>
                                    <label>{{ $contacadastro->Carteira }} </label><br>
                                    <b class="ls-label-text">Código de Uso do Banco:</b>
                                    <label>{{ $contacadastro->Uso_Bco }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Código da Moeda:</b>
                                    <label>{{ $contacadastro->Cod_Moeda }} </label><br>
                                    <b class="ls-label-text">Espécie da Moeda:</b>
                                    <label>{{ $contacadastro->Especie }} </label><br>
                                    <b class="ls-label-text">Espécie de Documento:</b>
                                    <label>{{ $contacadastro->Especie_Doc }} </label><br>
                                    <b class="ls-label-text">Aceite de Cobrança:</b>
                                    <label>{{ $contacadastro->Aceite=="S"?"Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Local de Pagamento:</b>
                                    <label>{{ $contacadastro->Local_Pgto }} </label><br>
                                    <b class="ls-label-text">Dias a conceder Desconto:</b>
                                    <label>{{ $contacadastro->Dias_Desc }} </label><br>
                                    <b class="ls-label-text">Percentual de Desconto:</b>
                                    <label>{{ $contacadastro->Perc_Desc }} </label><br>
                                    <b class="ls-label-text">Percentual de Multa:</b>
                                    <label>{{ $contacadastro->Perc_Multa }} </label><br>
                                    <b class="ls-label-text">Percentual de juros:</b>
                                    <label>{{ $contacadastro->Perc_Juros }} </label><br>
                                    <b class="ls-label-text">Dias para avisar no boleto de Protesto:</b>
                                    <label>{{ $contacadastro->Dias_AvisoProt }} </label><br>
                                    <b class="ls-label-text">Dias a enviar a protesto:</b>
                                    <label>{{ $contacadastro->Dias_Prot }} </label><br>
                                    <b class="ls-label-text">Taxa de emissão do Boleto:</b>
                                    <label>{{ $contacadastro->Tx_Emissao }} </label><br>
                                    <b class="ls-label-text">Cod. Empresa:</b>
                                    <label>{{ $contacadastro->Empresa}} </label><br>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @can('insere_saldo')
    <ul class="nav nav-tabs ml-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link " href="#saldo" role="tab" data-toggle="tab"><b>+ Saldo</b> </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade" id="saldo">
            <div class="container">
                @include('modals.modal_conta_saldo')
            </div>
        </div>
    </div>
    @endcan

    <div class="col-md-12">
        <div class="card">
        @can('visual_saldo')
            <div class="card-header">
                <h4 class="card-title">Saldo</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Conta:</th>
                                <th>Dados da Transaçao:</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contasaldo as $contasaldo)
                                @if( $contasaldo->Cod_Conta == $contacadastro->Codigo )
                                    <tr>

                                        <td>
                                            <b><label for="">Data:</b> {{ $contasaldo->Data }}</label><br>
                                            @if($contasaldo->Turno==1)
                                                <b><label for="">Turno:</b> Manhã</label><br>
                                            @elseif($contasaldo->Turno==2)
                                                <b><label for="">Turno:</b> Tarde</label><br>
                                            @else
                                                <b><label for="">Turno:</b> Noite</label><br>
                                            @endif
                                            <b><label for="">Saldo Inicial:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Saldo_Inicial }}</label>
                                            <br>
                                            <b><label for="">Salto Total:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Saldo_Final }}</label><br>
                                            @if($contasaldo->Situacao=="A")
                                                <b><label for="">Situação:</b> Aberto</label><br>
                                                @elseif($contasaldo->Situacao=="X")
                                                <b><label for="">Situação:</b> Ausente</label><br>
                                            @else
                                                <b><label for="">Situação:</b> Fechado</label><br>
                                            @endif
                                            <b><label for="">Empresa:</b> {{ $contasaldo->Empresa }}</label> <br>
                                            <b><label for="">Funcionário:</b> {{ $contasaldo->Cod_Fun }}</label> <br>

                                        </td>
                                        <td>
                                            <b><label for="">Total de Entrada:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Ent }}</label> <br>
                                            <b><label for="">Total de Saída:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Sai }}</label><br>
                                            <b><label for="">Total Movimentado em Dinheiro:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Dinheiro }}</label>
                                            <br>
                                            <b><label for="">Total Movimentado em Cartão:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Cartao }}</label><br>
                                            <b><label for="">Total Movimentado em Cheque:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Cheque }}</label>
                                            <br>
                                            <b><label for="">Total Movimentado em Duplicata:</b>
                                            {{ $contacadastro->Especie }}{{ $contasaldo->Total_Duplicata }}</label>
                                        </td>
                                        <td>
                                        @can('deleta_saldo')
                                            <div class="btn-group" role="group">
                                            <a href="javascript:deletarSaldo('{{ $contasaldo->Codigo }}')"
                                            class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
                                            </div>
                                        @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endcan
        </div>
    </div>



</div>
<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script>
    function deletarSaldo(id) {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        swal({
            title: "Excluir",
            text: "Excluir do item selecionado?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Sim',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Não',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url("Conta/saldo/excluir") }}" + '/' + id,
                    type: 'DELETE',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: function () {
                        location.reload();
                        swal({
                            title: "Registro deletado com sucesso!",
                            icon: "success",
                        });

                    },
                    error: function () {
                        swal("Erro!", "Algo de errado aconteceu!", );
                    }
                });

            }
        });
    }
</script>
@endsection
