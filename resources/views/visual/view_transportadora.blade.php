@extends("template")

@section("conteudo")

@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
      @include('sweetalert::alert')


<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/transportadoras") }}" class="btn btn-primary btn-xs ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $transportadora->Nome_Fantasia }}
                </h4>
                <div class="btn-group" role="group">
            @can('edita_transp')
        <a href='{{ url("/Transportadora/editar/$transportadora->Codigo") }}'class="btn btn-success btn-xs" style="border-radius:2px;">
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
                                <th>Dados da Transportadora</th>
                                <th>Dados de Endereço</th>
                                <th>Dados de Frete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <b class="ls-label-text">Nome Fantasia:</b>
                                    <label>{{ $transportadora->Nome_Fantasia }} </label><br>
                                    <b class="ls-label-text">Razão Social:</b>
                                    <label>{{ $transportadora->Razao_Social }} </label><br>
                                    <b class="ls-label-text">CPF:</b>
                                    <label>{{ $transportadora->CPF }} </label><br>
                                    <b class="ls-label-text">RG:</b>
                                    <label>{{ $transportadora->RG }} </label><br>
                                    <b class="ls-label-text">inscrição Estadual:</b>
                                    <label>{{ $transportadora->IE }} </label><br>
                                    <b class="ls-label-text">CNPJ:</b>
                                    <label>{{ $transportadora->CNPJ }} </label><br>
                                    <b class="ls-label-text">Telefone:</b>
                                    <label>{{ $transportadora->Telefone }} </label><br>
                                    <b class="ls-label-text">Celular:</b>
                                    <label>{{ $transportadora->Celular }} </label><br>
                                    <b class="ls-label-text">Telefone Comercial:</b>
                                    <label>{{ $transportadora->Comercial }} </label><br>
                                    <b class="ls-label-text">Email:</b>
                                    <label>{{ $transportadora->Email }} </label><br>
                                    <b class="ls-label-text">Tipo:</b>
                                    <label>{{ $transportadora->Tipo=="F"? "Física":"Jurídica" }}
                                    </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Endereço:</b>
                                    <label>{{ $transportadora->Endereco }} </label><br>
                                    <b class="ls-label-text">Bairro:</b>
                                    <label>{{ $transportadora->Bairro }} </label><br>
                                    <b class="ls-label-text">Cidade:</b>
                                    <label>{{ $transportadora->Cidade }} </label><br>
                                    <b class="ls-label-text">Estado:</b>
                                    <label>{{ $transportadora->Estado }} </label><br>
                                    <b class="ls-label-text">CEP:</b>
                                    <label>{{ $transportadora->CEP }} </label><br>
                                </td>
                                <td>
                                    <b class="ls-label-text">Tipo de Frete:</b>
                                    <label>{{ $transportadora->Tipo_Frete=="KM"?"Kilometragem":"Destino" }}
                                    </label><br>
                                    <b class="ls-label-text">Frete por M :</b>
                                    <label>{{ $transportadora->FreteM }} </label><br>
                                    <b class="ls-label-text">Frete por M<sup>2</sup> :</b>
                                    <label>{{ $transportadora->FreteM2 }} </label><br>
                                    <b class="ls-label-text">Frete por M<sup>3</sup> :</b>
                                    <label>{{ $transportadora->FreteM3 }} </label><br>
                                    <b class="ls-label-text">Frete por:</b>
                                    <label>{{ $transportadora->FretePor=="K"?"Kilometragem":"Destino" }}
                                    </label><br>
                                    <b class="ls-label-text">Cod. Empresa:</b>
                                    <label>{{ $transportadora->Empresa }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <br>
    <h5 class="ml-2">Dados Adicionais</h5>
    @can('insere_transp')
    <ul class="nav nav-tabs ml-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link " href="#destino" role="tab" data-toggle="tab"><button class="btn btn-info btn-rounded"> + Destino</button></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#valor" role="tab" data-toggle="tab"> <button class="btn btn-info btn-rounded"> + Valor</button></a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade" id="destino">
            <div class="container">
                @include("modals.modal_transp_destino")
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="valor">
            <div class="container">
                @include("modals.modal_transp_valor")
            </div>
        </div>
    </div>
    @endcan
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Destinos:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center ">
                        <thead>
                            <tr>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Índice para Cobrança</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transportadora_destino as $transportadora_destino)
                            @if( $transportadora_destino->Cod_Transp == $transportadora->Codigo )
                                    <tr>
                                        <td>{{ $transportadora_destino->Destino_Cidade }}</td>
                                        <td>{{ $transportadora_destino->Destino_UF }}</td>
                                        <td>{{ $transportadora_destino->Indice }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_transp')
                                                <a href='{{ url("/Transportadora/destino/editar/$transportadora_destino->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            @endcan
                                            @can('deleta_transp')
                                                    <a href="javascript:deletarDestino('{{ $transportadora_destino->Codigo }}')" class="btn btn-danger btn-xs" style="border-radius:2px;">
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
                <h4 class="card-title">Valores:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>KM Inicial</th>
                                <th>KM Final</th>
                                <th>Índice para Cobrança</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transportadora_valor as $transportadora_valor)
                            @if( $transportadora_valor->Cod_Transp == $transportadora->Codigo )
                                    <tr>
                                        <td>{{ $transportadora_valor->KmIni }}</td>
                                        <td>{{ $transportadora_valor->KmFim }}</td>
                                        <td>{{ $transportadora_valor->Indice_v }}</td>
                                        
                                        <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_transp')
                                                <a href='{{ url("/Transportadora/valor/editar/$transportadora_valor->Codigo") }}'  class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            @endcan
                                            @can('deleta_transp')
                                                    <a href="javascript:deletarValor('{{ $transportadora_valor->Codigo }}')" class="btn btn-danger btn-xs" style="border-radius:2px;">
                                                            <i class='far fa-trash-alt'></i>
                                                        </a>
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
    function deletarDestino(id) {
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
                    url: "{{ url("Transportadora/destino/excluir") }}" + '/' + id,
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

    function deletarValor(id) {
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
                    url: "{{ url("Transportadora/valor/excluir") }}" + '/' + id,
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