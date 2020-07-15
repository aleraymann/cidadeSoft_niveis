@extends("template")

@section("conteudo")
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
      @include('sweetalert::alert')

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/Clifor") }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    @if( $clifor->Tip=="C")
                        Cliente:
                    @elseif( $clifor->Tip=="F")
                        Fornecedor:
                    @else
                        Cliente e Fornecedor:
                    @endif
                    {{ $clifor->Nome_Fantasia }}

                </h4>
                <div class="btn-group " role="group">
                @can('edita_cliente')
                    <a href='{{ url("/Clifor/editar/$clifor->Codigo") }}'
                        class="btn btn-success btn-xs"><i class='far fa-edit'></i></a>
                @endcan
               
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Dados</th>
                                <th>Tipo e Perfil</th>
                                <th>Financeiro e Movimentação</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Nome Fantasia:</b>
                                    <label>{{ $clifor->Nome_Fantasia }} </label><br>
                                    <b class="ls-label-text">Razão Social:</b>
                                    <label>{{ $clifor->Razao_Social }} </label><br>
                                    <b class="ls-label-text">Estado Civil:</b>
                                    @if( $clifor->Estado_Civil=="C")
                                        <label>{{ $clifor->Estado_Civil = "Casado" }}
                                        </label><br>
                                    @elseif( $clifor->Estado_Civil=="S")
                                        <label>{{ $clifor->Estado_Civil = "Solteiro" }}
                                        </label><br>
                                    @elseif( $clifor->Estado_Civil=="D")
                                        <label>{{ $clifor->Estado_Civil = "Divorciado" }}
                                        </label><br>
                                    @elseif( $clifor->Estado_Civil=="V")
                                        <label>{{ $clifor->Estado_Civil = "Viúvo" }}
                                        </label><br>
                                    @else
                                        <label>{{ $clifor->Estado_Civil = "" }} </label><br>
                                    @endif
                                    <b class="ls-label-text">Sexo:</b>
                                    <label>{{ $clifor->Sexo=="M"? "Masculino":"Feminino" }}
                                    </label><br>
                                    <b class="ls-label-text">Situação:</b>
                                    <label>{{ $clifor->Ativo==1? "Ativo":"Inativo" }}
                                    </label><br>
                                    <b class="ls-label-text">CPF:</b>
                                    <label>{{ $clifor->CPF }} </label><br>
                                    <b class="ls-label-text">RG:</b>
                                    <label>{{ $clifor->RG }} </label><br>
                                    <b class="ls-label-text">CNPJ:</b>
                                    <label>{{ $clifor->CNPJ }} </label><br>
                                    <b class="ls-label-text">Telefone</b>
                                    <label>({{ $clifor->Operadora1 }}) - {{ $clifor->Telefone }} </label><br>
                                    <b class="ls-label-text">Celular</b>
                                    <label>({{ $clifor->Operadora2 }}) - {{ $clifor->Celular }} </label><br>
                                    <b class="ls-label-text">Telefone Comercial ou FAX</b>
                                    <label>({{ $clifor->Operadora3 }}) - {{ $clifor->Comercial }} </label><br>
                                    <b class="ls-label-text">Email:</b>
                                    <label>{{ $clifor->Email }} </label><br>
                                    <b class="ls-label-text">Site:</b>
                                    <label>{{ $clifor->Site }} </label><br>
                                    <b class="ls-label-text">Profissao:</b>
                                    <label>{{ $clifor->Profissao }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Tipo de Cliente(Fisico/Jurídico):</b>
                                    <label>{{ $clifor->Fis_Jur=="F"?"Física":"Jurídica" }}
                                    </label><br>
                                    <b class="ls-label-text">Tipo:Cliente/Fornecedor):</b>
                                    @if( $clifor->Tip=="C")
                                        <label>{{ $clifor->Tip = "Cliente" }} </label><br>
                                    @elseif( $clifor->Tip=="F")
                                        <label>{{ $clifor->Tip = "Fornecedor" }}
                                        </label><br>
                                    @else
                                        <label>{{ $clifor->Tip = "Ambos" }} </label><br>
                                    @endif
                                    <b class="ls-label-text">Atacadista?</b>
                                    <label>{{ $clifor->Cli_Atacado==1?"Sim":"Não" }}
                                    </label><br>
                                    <b class="ls-label-text">Perfil do Cliente/Fornecedor:</b>
                                    <label>{{ $clifor->Perfil }} </label><br>
                                    <b class="ls-label-text">Inscrição Municipal:</b>
                                    <label>{{ $clifor->IM }} </label><br>
                                    <b class="ls-label-text">Inscrição Estadual:</b>
                                    <label>{{ $clifor->IE }} </label><br>
                                    <b class="ls-label-text">Inscricao Estadual do Substituto Tributario:</b>
                                    <label>{{ $clifor->IEST }} </label><br>
                                    <b class="ls-label-text">Classe ABC:</b>
                                    <label>{{ $clifor->Class_ABC }} </label><br>
                                    <b class="ls-label-text">Situação Financeira:</b>
                                    <label>{{ $clifor->SitFinanc=="L"?"Livre":"Bloqueado" }}
                                    </label><br>
                                    <b class="ls-label-text">Data do Cadastro:</b>
                                    <label>{{ $clifor->Data_Cadastro }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Limite de Crédito:</b>
                                    <label>{{ $clifor->LimiCred }} </label><br>
                                    <b class="ls-label-text">Percentual de Desconto ou Acrescimo nos valores:</b>
                                    <label>{{ $clifor->PercDescAcresc }} </label><br>
                                    <b class="ls-label-text">Cod. Vendedor:</b>
                                    <label>{{ $clifor->Vendedor }} </label><br>
                                    <b class="ls-label-text">Cod. Empresa:</b>
                                    <label>{{ $clifor->Empresa }} </label><br>
                                    <b class="ls-label-text">Ultima Movimentação:</b>
                                    @if( $clifor->Local_UltMov=="PED")
                                        <label>{{ $clifor->Local_UltMov = "Pedido" }}
                                        </label><br>
                                    @elseif( $clifor->Local_UltMov=="OS")
                                        <label>{{ $clifor->Local_UltMov = "Ordem de Serviço" }}
                                        </label><br>
                                    @else
                                        <label>{{ $clifor->Local_UltMov = "Nota Fiscal" }}
                                        </label><br>
                                    @endif
                                    <b class="ls-label-text">Data da Ultima Movimentação:</b>
                                    <label>{{ $clifor->Data_UltMov }} </label><br>
                                    <b class="ls-label-text">Observaões sobre o cliente:</b>
                                    <label>{{ $clifor->Observacoes }} </label><br>
                                    <b class="ls-label-text">Aviso ao Cliente/Fornecedor:</b>
                                    <label>{{ $clifor->Aviso }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h5 class="ml-2">Dados Adicionais</h5>
    @can('insere_cliente')
    <ul class="nav nav-tabs ml-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link " href="#contato" role="tab" data-toggle="tab"><button class="btn btn-info btn-rounded"> + Contato</button></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#endereco" role="tab" data-toggle="tab"><button class="btn btn-info btn-rounded"> + Endereço</button></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#referencia" role="tab" data-toggle="tab"><button class="btn btn-info btn-rounded"> + Referência</button></a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content ">
        <div role="tabpanel" class="tab-pane fade" id="contato">
            <div class="container">
                @include("modals.modal_clifor_contato")
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="endereco">
            <div class="container">
                @include("modals.modal_clifor_endereco")
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="referencia">
            <div class="container">
                @include("modals.modal_clifor_referencia")
            </div>
        </div>
    </div>
    @endcan
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contatos Adicionados:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Tipo</th>
                                <th>Setor</th>
                                <th>Data Nascimento</th>
                                <th>RG</th>
                                <th>CPF</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clifor_contato as $clifor_contato)
                                @if( $clifor_contato->Cod_CliFor == $clifor->Codigo )
                                    <tr>
                                        <td>{{ $clifor_contato->Nome }}</td>
                                        <td>{{ $clifor_contato->Celular }}</td>
                                        <td>{{ $clifor_contato->Tipo }}</td>
                                        <td>{{ $clifor_contato->Setor }}</td>
                                        <td>{{ $clifor_contato->Data_Nasc }}</td>
                                        <td>{{ $clifor_contato->RG }}</td>
                                        <td>{{ $clifor_contato->CPF }}</td>
                                        <td>{{ $clifor_contato->Email }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_cliente')
                                                <a href='{{ url("/Clifor/contato/editar/$clifor_contato->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            @endcan
                                            @can('deleta_cliente')
                                                    <a href="javascript:deletarContato('{{ $clifor_contato->Codigo }}')" class="btn btn-danger btn-xs" style="border-radius:2px;">
                                                            <i class='far fa-trash-alt'></i>
                                                        </a>
                                            @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Endereços Adicionados:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>CEP</th>
                                <th>Tipo de Endereco</th>
                                <th>Endereco</th>
                                <th>Numero</th>
                                <th>Bairro</th>
                                <th>Complemento</th>
                                <th>Ponto de Referência</th>
                                <th>Cod_IBGE</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clifor_endereco as $clifor_endereco)
                                @if( $clifor_endereco->Cod_CliFor == $clifor->Codigo )
                                    </tr>
                                    <tr>
                                        <td>{{ $clifor_endereco->CEP }}</td>
                                       
                                        @if( $clifor_endereco->Tipo_Endereco=="C")
                                            <td>{{ $clifor_endereco->Tipo_Endereco = "Correspondência" }}
                                            </td>
                                            @elseif( $clifor_endereco->Tipo_Endereco=="E")
                                            <td>{{ $clifor_endereco->Tipo_Endereco = "Entrega" }}
                                            </td>
                                        @else
                                            <td>{{ $clifor_endereco->Tipo_Endereco = "Ambos" }}
                                            </td>
                                        @endif
                                        <td>{{ $clifor_endereco->Endereco }}</td>
                                        <td>{{ $clifor_endereco->Numero }}</td>
                                        <td>{{ $clifor_endereco->Bairro }}</td>
                                        <td>{{ $clifor_endereco->Complemento }}</td>
                                        <td>{{ $clifor_endereco->Ponto_Referencia }}</td>
                                        <td>{{ $clifor_endereco->Cod_IBGE }}</td>
                                        <td>{{ $clifor_endereco->Cidade }}</td>
                                        <td>{{ $clifor_endereco->Estado }}</td>

                                        <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_cliente')
                                                <a href='{{ url("/Clifor/endereco/editar/$clifor_endereco->Codigo") }}'class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            @endcan
                                            @can('deleta_cliente')
                                                    <a href="javascript:deletarEndereco('{{ $clifor_endereco->Codigo }}')"class="btn btn-danger btn-xs" style="border-radius:2px;">
                                                            <i class='far fa-trash-alt'></i>
                                                        </a>
                                            @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Referências cadastradas:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center ">
                        <thead>
                            <tr>
                                <th>Loja / Banco</th>
                                <th>Conta</th>
                                <th>Telefone</th>
                                <th>Data da última Compra</th>
                                <th>Valor da última Compra</th>
                                <th>Limite</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clifor_referencia as $clifor_referencia)
                                @if( $clifor_referencia->Cod_CliFor == $clifor->Codigo )
                                    <tr>
                                        <td>{{ $clifor_referencia->Loja_Banco }}</td>
                                        <td>{{ $clifor_referencia->Conta }}</td>
                                        <td>{{ $clifor_referencia->Telefone }}</td>
                                        <td>{{ $clifor_referencia->Ult_Compra }}</td>
                                        <td>{{ $clifor_referencia->Valor_UltCompra }}</td>
                                        <td>{{ $clifor_referencia->Limite }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_cliente')
                                                <a href='{{ url("/Clifor/referencia/editar/$clifor_referencia->Codigo") }}'class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            @endcan
                                            @can('deleta_cliente')
                                                    <a href="javascript:deletarReferencia('{{ $clifor_referencia->Codigo }}')"class="btn btn-danger btn-xs" style="border-radius:2px;">
                                                            <i class='far fa-trash-alt'></i>
                                                        </a>
                                            @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
<script type="text/javascript">
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        if (strCPF == "11111111111") return false;
        if (strCPF == "22222222222") return false;
        if (strCPF == "33333333333") return false;
        if (strCPF == "44444444444") return false;
        if (strCPF == "55555555555") return false;
        if (strCPF == "66666666666") return false;
        if (strCPF == "77777777777") return false;
        if (strCPF == "88888888888") return false;
        if (strCPF == "99999999999") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }
    alert(TestaCPF(strCPF));

    function validarCNPJ(el) {
        if (!_cnpj(el.value)) {

            alert("CNPJ inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }

    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("CPF inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }

</script>
<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script>
    function deletarContato(id) {
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
                    url: "{{ url("Clifor/contato/excluir") }}" + '/' + id,
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

    function deletarEndereco(id) {
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
                    url: "{{ url("Clifor/endereco/excluir") }}" + '/' + id,
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

    function deletarReferencia(id) {
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
                    url: "{{ url("Clifor/referencia/excluir") }}" + '/' + id,
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
<script>
(function checkForm(form){
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    // se validar desabilita o botao
                    if (form.checkValidity() === true) {
                        form.cadastrar.disabled = true;
                    }
                    form.classList.add('was-validated');
                   
                }, false);
               
            });
        }, false);
    })();

</script>