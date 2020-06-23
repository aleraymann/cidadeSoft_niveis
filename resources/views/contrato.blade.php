@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Dia_Venc").mask("99999");
        $("#Perc_Comissao").mask("9.99");
        $("#Valor").mask("99999999.99");
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
                <h4 class="card-title">Contrato Cliente/Fornecedor
                @can('insere_contrato')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Contrato
                    </button>
                @endcan
                </h4>
            @include("modals.modal_contrato")
              
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Cod do Cli/For</th>
                                <th class="">Dia do Vencimento</th>
                                <th class="">Data do Contrato</th>
                                <th class="">Mensalidade</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($contrato as $c)
                           @can('view_contrato', $c)
                                <tr>
                                    <td class="">{{ $c->Codigo }}  </td>
                                    <td class="">{{ $c->Cod_CliFor }}  </td>
                                    <td class="">{{ $c->Dia_Venc }}  </td>
                                    <td class="">{{ $c->Data }}  </td>
                                    <td class="">{{ $c->Valor }}  </td>
                                    <td class="">{{ $c->user_id }}  </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        @can('edita_contrato')
                                            <a href='{{ url("/Contrato/editar/$c->Codigo") }}'
                                                class="btn btn-success"><i class='far fa-edit'></i></a>
                                        @endcan
                                        @can('visual_contrato')
                                            <a href='{{ url("/Contrato/visualizar/$c->Codigo") }}'
                                                class="btn btn-secondary"><i class='far fa-eye'></i></a>
                                        @endcan
                                        @can('deleta_contrato')
                                            <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                                class="btn btn-danger "><i class='fas fa-trash-alt'></i></a>
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
    {{ $contrato->links() }}
    </div>
</div>

@endsection


<!--validação-->
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
                    url: "{{ url("Contrato/excluir") }}" + '/' + id,
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