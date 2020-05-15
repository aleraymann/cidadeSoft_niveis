@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Telefone").mask("99-9999-9999");
        $("#Comercial").mask("99-9999-9999");
        $("#Celular").mask("99-99999-9999");
        $("#CPF").mask("99999999999");
        $("#RG").mask("9999999999999");
        $("#CNPJ").mask("99.999.999/9999-99");
        $("#Data_Cadastro").mask("99/99/9999");
        $("#Data_Nascimento").mask("99/99/9999");
        $("#IM").mask("9999999999");
        $("#IE").mask("99999999999999");
        $("#IEST").mask("99999999999999");
        $("#LimiCred").mask("99999999.99");
        $("#PercDescAcresc").mask("99.99");
    });

</script>

@if(session('success_message'))
    <div class="alert alert-danger">
        {{ session('success_message') }}
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
                <h4 class="card-title">Clientes / Fornecedores
                    @can('insere_cliente')
                        <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                            data-target="#myModal">
                            <i class='fas fa-plus'></i> Cliente
                        </button>
                    @endcan
                </h4>

                @include("modals.modal_clifor")

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Codigo</th>
                                <th class="">Nome Fantasia</th>
                                <th class="">Situação</th>
                                <th class="">Data do Cadastro</th>
                                <th class="">Cliente/Fornecedor</th>
                                <th class="">Cod Administrador</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clifor as $cf)
                                @if( Auth::user()->hasAnyRoles('s_adm'))
                                    <tr>
                                        <td> {{ $cf->Codigo }} </td>
                                        <td> {{ $cf->Nome_Fantasia }} </td>
                                        <td> {{ $cf->Ativo==1? "Ativo":"Inativo" }}
                                        </td>
                                        <td> {{ $cf->Data_Cadastro }} </td>
                                        @if( $cf->Tip=="C")
                                            <td> {{ $cf->Tip = "Cliente" }} </td>
                                        @elseif( $cf->Tip=="F")
                                            <td> {{ $cf->Tip = "Fornecedor" }} </td>
                                        @else
                                            <td> {{ $cf->Tip = "Ambos" }} </td>
                                        @endif
                                        <td> {{ $cf->user_id }} </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                    <a href='{{ url("/Clifor/editar/$cf->Codigo") }}'
                                                        class="btn btn-success "><i class='far fa-edit'></i></a>
                                                    <a href='{{ url("/Clifor/vizualizar/$cf->Codigo") }}'
                                                        class="btn btn-secondary"><i class='far fa-eye'></i></a>
                                                    <a href="javascript:deletarRegistro('{{ $cf->Codigo }}')"
                                                        class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                               
                                            </div>
                                        </td>

                                    </tr>
                                @else
                                    @can("view_cli_func",$cf)
                                        <tr>
                                            <td> {{ $cf->Codigo }} </td>
                                            <td> {{ $cf->Nome_Fantasia }} </td>
                                            <td> {{ $cf->Ativo==1? "Ativo":"Inativo" }}
                                            </td>
                                            <td> {{ $cf->Data_Cadastro }} </td>
                                            @if( $cf->Tip=="C")
                                                <td> {{ $cf->Tip = "Cliente" }} </td>
                                            @elseif( $cf->Tip=="F")
                                                <td> {{ $cf->Tip = "Fornecedor" }} </td>
                                            @else
                                                <td> {{ $cf->Tip = "Ambos" }} </td>
                                            @endif
                                            <td> {{ $cf->user_id }} </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    @can('edita_cliente')
                                                        <a href='{{ url("/Clifor/editar/$cf->Codigo") }}'
                                                            class="btn btn-success "><i class='far fa-edit'></i></a>
                                                    @endcan
                                                    @can('visual_cliente')
                                                        <a href='{{ url("/Clifor/vizualizar/$cf->Codigo") }}'
                                                            class="btn btn-secondary"><i class='far fa-eye'></i></a>
                                                    @endcan
                                                    @can('deleta_cliente')
                                                        <a href="javascript:deletarRegistro('{{ $cf->Codigo }}')"
                                                            class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                                    @endcan
                                                </div>
                                            </td>

                                        </tr>
                                    @endcan
                                    @can("view_cli_adm",$cf)
                                        <tr>
                                            <td> {{ $cf->Codigo }} </td>
                                            <td> {{ $cf->Nome_Fantasia }} </td>
                                            <td> {{ $cf->Ativo==1? "Ativo":"Inativo" }}
                                            </td>
                                            <td> {{ $cf->Data_Cadastro }} </td>
                                            @if( $cf->Tip=="C")
                                                <td> {{ $cf->Tip = "Cliente" }} </td>
                                            @elseif( $cf->Tip=="F")
                                                <td> {{ $cf->Tip = "Fornecedor" }} </td>
                                            @else
                                                <td> {{ $cf->Tip = "Ambos" }} </td>
                                            @endif
                                            <td> {{ $cf->user_id }} </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href='{{ url("/Clifor/editar/$cf->Codigo") }}'
                                                        class="btn btn-success "><i class='far fa-edit'></i></a>
                                                        @can('view_clifor', $cf) 
                                                    <a href='{{ url("/Clifor/vizualizar/$cf->Codigo") }}'
                                                        class="btn btn-secondary"><i class='far fa-eye'></i></a>
                                                        @endcan
                                                    <a href="javascript:deletarRegistro('{{ $cf->Codigo }}')"
                                                        class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endcan
                                @endif
                                @if( Auth::user()->hasAnyRoles('financeiro'))
                                @can("view_cli_fin",$cf)
                                    <tr>
                                        <td> {{ $cf->Codigo }} </td>
                                        <td> {{ $cf->Nome_Fantasia }} </td>
                                        <td> {{ $cf->Ativo==1? "Ativo":"Inativo" }}
                                        </td>
                                        <td> {{ $cf->Data_Cadastro }} </td>
                                        @if( $cf->Tip=="C")
                                            <td> {{ $cf->Tip = "Cliente" }} </td>
                                        @elseif( $cf->Tip=="F")
                                            <td> {{ $cf->Tip = "Fornecedor" }} </td>
                                        @else
                                            <td> {{ $cf->Tip = "Ambos" }} </td>
                                        @endif
                                        <td> {{ $cf->user_id }} </td>
                                    </tr>
                                    @endcan
                                    @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        {{ $clifor->links() }}
    </div>
</div>

@endsection


<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function () {
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
                    url: "{{ url("Clifor/excluir") }}" + '/' + id,
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
