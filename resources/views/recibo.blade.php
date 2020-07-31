@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Valor").mask("99999999.99");
        $("#Transacao").mask("99999999999");
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
                <h4 class="card-title">Recibos
                @can('insere_recibo')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Recibo
                    </button>
                @endcan
                </h4>

                @include("modals.modal_recibo")
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Pago/Recebido</th>
                                <th class="">Valor</th>
                                <th class="">Data</th>
                                <th class="">Cod Adm</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recibo as $n)
                            @can('view_recibo', $n)
                                <tr>
                                    <td class=""> {{ $n->Codigo }} </td>
                                    <td class=""> {{ $n->Pag_Rec == "P"? "Pago": "Recebido" }} </td>
                                    <td class=""> {{ $n->Valor }} </td>
                                    <td class=""> {{ $n->Data }} </td>
                                    <td class=""> {{ $n->user_id }} </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        @can('edita_recibo')
                                            <a href='{{ url("/Recibo/editar/$n->Codigo") }}'
                                            class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                        @endcan
                                        @can('visual_recibo')
                                        <a href='{{url("/Recibo/visualizar/$n->Codigo")}}'class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;">
                                        <i class='far fa-eye'></i></a>
                                        @endcan
                                        @can('deleta_recibo')
                                            <a href="javascript:deletarRegistro('{{ $n->Codigo }}')"
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
        {{ $recibo->links() }}
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
                    url: "{{ url("Recibo/excluir") }}" + '/' + id,
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
