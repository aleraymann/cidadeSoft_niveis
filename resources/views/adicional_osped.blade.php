@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_item").mask("99999999999");
        $("#Valor").mask("99999999.99", {
            reverse: true
        });
        $("#Qtd_Alterar").mask("999999.9999", {
            reverse: true
        });
        $("#Cod_Item_Dev").mask("99999");
        $("#Qtd_Dev").mask("999999.9999", {
            reverse: true
        });
    });

</script>
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <p> {{ $error }} </p>
        @endforeach
    </div>
@endif

<div class="main-panel">
    <div style="margin-top:60px">
        <!-- Button to Open the Modal -->
        @include("mensagem")
        <!--end container-->
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Adicional OS/Pedido
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Adicional
                    </button>
                </h4>

                @include("modals.modal_adicional_osped")
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Cod Item</th>
                                <th class="">Cod Ref Item</th>
                                <th class="">Descrição</th>
                                <th class="">Valor</th>
                                <th class="">Quantidade a Alterar</th>
                                <th class="">Cod Produto Devolução</th>
                                <th class="">Cod de Referencia Devolução</th>
                                <th class="">Quantidade a Devolver</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($adicional_osped as $adicional)
                                <tr>
                                    <td> {{ $adicional->Codigo }} </td>
                                    <td> {{ $adicional->Cod_item }} </td>
                                    <td> {{ $adicional->Cod_Ref }} </td>
                                    <td> {{ $adicional->Descricao }} </td>
                                    <td> {{ $adicional->Valor }} </td>
                                    <td> {{ $adicional->Qtd_Alterar }} </td>
                                    <td> {{ $adicional->Cod_Item_Dev }} </td>
                                    <td> {{ $adicional->Cod_Ref_Dev }} </td>
                                    <td> {{ $adicional->Qtd_Dev }} </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href='{{ url("/AdicionalOS/editar/$adicional->Codigo") }}'
                                                class="btn btn-success "><i class='far fa-edit'></i></a>
                                                <a href="javascript:deletarRegistro('{{ $adicional->Codigo }}')"
                                                class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        {{ $adicional_osped->links() }}
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
                    url: "{{ url("AdicionalOS/excluir") }}" + '/' + id,
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
