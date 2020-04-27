@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Nro_Doc").mask("99999999999999");
        $("#Nosso_Num").mask("99999999999999999999");
        $("#Valor").mask("99999999.99");
        $("#Inst_1").mask("99999");
        $("#Inst_2").mask("99999");
        $("#Multa").mask("9.99");
        $("#Taxa_Juros").mask("9.99");
        $("#Acrescimo").mask("99999999.99");
        $("#Desconto").mask("99999999.99");
        $("#Transacao").mask("9999999999");


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
                <h4 class="card-title">Títulos
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Títulos
                    </button>
                </h4>

                @include("modals.modal_boleto_titulo")
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Data</th>
                                <th class="">Vencimento</th>
                                <th class="">Núm do Titulo no Banco</th>
                                <th class="">Valor</th>
                                <th class="">Situação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($boleto_titulo as $titulo)
                                <tr>
                                    <td> {{ $titulo->Codigo }} </td>
                                    <td> {{ $titulo->Data_Doc }} </td>
                                    <td> {{ $titulo->Vencimento }} </td>
                                    <td> {{ $titulo->Nosso_Num }} </td>
                                    <td> {{ $titulo->Valor }} </td>
                                    @if( $titulo->Situacao=="C")
                                        <td> {{ $titulo->Situacao = "Carteira" }} </td>
                                    @elseif( $titulo->Situacao=="B")
                                        <td> {{ $titulo->Situacao = "Baixado" }} </td>
                                    @elseif( $titulo->Situacao=="L")
                                        <td> {{ $titulo->Situacao = "Liquidado" }} </td>
                                    @else
                                        <td> {{ $titulo->Situacao = "Vencido" }} </td>
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href='{{ url("/Boleto_titulo/editar/$titulo->Codigo") }}'
                                                class="btn btn-success "><i class='far fa-edit'></i></a>
                                            <a href='{{ url("/Boleto_titulo/vizualizar/$titulo->Codigo") }}'
                                                class="btn btn-secondary"><i class='far fa-eye'></i></a>
                                                <a href="javascript:deletarRegistro('{{ $titulo->Codigo }}')"
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
        {{ $boleto_titulo->links() }}
    </div>
</div>





<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2">Títulos</h1>
    <button type="button" class="btn btn-success mr-5 mt-20  btn-rounded" data-toggle="modal" data-target="#myModal">
        <i class='fas fa-plus'></i> Boleto Títulos
    </button>

</div>

<table class="table-sm table-bordered table-hover table-responsive text-center">
    <tr>

    </tr>

</table>
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
                    url: "{{ url("Boleto_titulo/excluir") }}" + '/' + id,
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