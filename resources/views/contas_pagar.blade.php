@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Parcela").mask("99/99");
        $("#Valor_Origem").mask("99999999.99");
        $("#Valor_Divida").mask("99999999.99");
        $("#Multa").mask("99999999.99");
        $("#Taxa_Juros").mask("9.99");
        $("#Desconto").mask("99999999.99");
        $("#Juros").mask("99999999.99");
        $("#Divida_Estimada").mask("99999999.99");
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
                <h4 class="card-title">Contas a Pagar
               
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Contas
                    </button>
               
                </h4>

                @include("modals.modal_contas_pagar")
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($ctas_pagar as $c)
                               
                                    <tr>
                                        <td class=""> {{ $c->Codigo }} </td>
                                        <td> {{ $c->user_id }} </td>
                                        <td class="">
                                            <div class="btn-group" role="group">
                                            @can('edita_condPag')
                                                <a href='{{ url("/Condicao/editar/$c->Codigo") }}'
                                                    class="btn btn-success"><i class='far fa-edit'></i></a>
                                            @endcan
                                            @can('deleta_condPag')
                                                    <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                                    class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
                                            @endcan
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
                    url: "{{ url("Condicao/excluir") }}" + '/' + id,
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