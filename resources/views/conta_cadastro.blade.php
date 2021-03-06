@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_Banco").mask("999999");
        $("#Dig_Banco").mask("99");
        $("#Cod_Banco_Cob").mask("999999");
        $("#Dig_Banco_Cob").mask("99");
        $("#Cod_Age").mask("999999");
        $("#Dig_Age").mask("99");
        $("#CC").mask("999999");
        $("#Digito").mask("99");
        $("#Carteira").mask("99");
        $("#Uso_Bco").mask("9999");
        $("#Cod_Moeda").mask("99");
        $("#Dias_Desc").mask("99");
        $("#Perc_Desc").mask("9.99");
        $("#Perc_Multa").mask("9.99");
        $("#Perc_Juros").mask("9.99");
        $("#Dias_AvisoProt").mask("99");
        $("#Dias_Prot").mask("99");
        $("#Tx_Emissao").mask("9.99");
    });

</script>
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
    
      <div class="main-panel">
        <div style="margin-top:60px">
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->    
      </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contas
                @can('insere_conta')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Conta
                    </button>
                @endcan
                </h4>

                @include("modals.modal_conta_cadastro")
            </div>
            <div class="form-row col-lg-12">
                <div>
                    <a href="{{ url("/Cadastro/conta") }}" class="btn btn-sm btn-info mt-3 mr-2">Todos</a>
                </div>
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Código</option>
                        <option value="D">Descrição</option>
                    </select>
                </div>
                <div id="name" hidden>
                    <form action="{{ url('/Conta/busca') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-10 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Descrição">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                
                <div id="cod" hidden>
                    <form action="{{ url('/Conta/busca2') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-8 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Código">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
               
                <div class="form-row col-lg-12">
                @if($criterio != "")
                    <div class="card-body">
                        <h5>Encontrado com: "{{ $criterio }}" </h5>
                    </div>
                @endif
                </div>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Descrição</th>
                                <th class="">Número do Banco</th>
                                <th class="">Dígito do Banco</th>
                                <th class="">Nome do Banco</th>
                                <th class="">Agência</th>
                                <th class="">Conta</th>
                                <th class="">Tipo_Conta</th>
                                <th class="">Cod Empresa</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contacadastro as $contacad)
                            @can('view_conta', $contacad)
                                <tr>

                                    <td>{{ $contacad->Codigo }}</td>
                                    <td>{{ $contacad->Descricao }}</td>
                                    <td>{{ $contacad->Cod_Banco }}</td>
                                    <td>{{ $contacad->Dig_Banco }}</td>
                                    <td>{{ $contacad->Nome_Banco }}</td>
                                    <td>{{ $contacad->Cod_Age }}-{{ $contacad->Dig_Age }}</td>
                                    <td>{{ $contacad->CC }}-{{ $contacad->Digito }}</td>
                                    <td>{{ $contacad->Tipo_Conta=="C"? "Caixa":"Banco" }}
                                    </td>
                                    <td>{{ $contacad->Empresa }}</td>
                                    <td>{{ $contacad->user_id }}</td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        @can('edita_conta')
                                            <a href='{{ url("/Conta/editar/$contacad->Codigo") }}'
                                            class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                        @endcan
                                        @can('visual_conta')
                                            <a href='{{ url("/Conta/vizualizar/$contacad->Codigo") }}'
                                            class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;"><i class='far fa-eye'></i></a>
                                        @endcan
                                        @can('deleta_conta')
                                                <a href="javascript:deletarRegistro('{{ $contacad->Codigo }}')"
                                                class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='fas fa-trash-alt'></i></a>
                                        @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endcan
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{ $contacadastro->links() }}
    </div>
</div>

@endsection


<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
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
<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script>
    function deletarRegistro(id) {
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
                    url: "{{ url("Conta/excluir") }}" + '/' + id,
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
        function verificar(value) {
            var cod = document.getElementById("cod");
            var name = document.getElementById("name");
            if (value == "C") {
                cod.hidden = false;
                name.hidden = true;

            } else if (value == "D") {
                cod.hidden = true;
                name.hidden = false;
            }
        };
    </script>