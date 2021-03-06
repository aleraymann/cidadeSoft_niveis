@extends("template")

@section("conteudo")

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
                <h4 class="card-title">Centros de Custo
                @can('insere_centroCusto')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Centro de Custo
                    </button>
                @endcan
                </h4>

                @include("modals.modal_centrocusto")
            </div>
            <div class="form-row col-lg-12">
                <div>
                    <a href="{{ url("/Cadastro/centrocusto") }}" class="btn btn-sm btn-info mt-3 mr-2">Todos</a>
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
                    <form action="{{ url('/CentroCusto/busca') }}" method="post">
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
                    <form action="{{ url('/CentroCusto/busca2') }}" method="post">
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
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Descrição</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($centrocusto as $c_custo)
                                @can('view_centroCusto', $c_custo)
                                    <tr>
                                        <td class=""> {{ $c_custo->Codigo }} </td>
                                        <td class=""> {{ $c_custo->Descricao }} </td>
                                        <td class=""> {{ $c_custo->user_id }} </td>
                                        <td class="">
                                            <div class="btn-group" role="group">
                                            @can('insere_centroCusto')
                                                <a href='{{ url("/CentroCusto/editar/$c_custo->Codigo") }}'
                                                class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                            @endcan
                                            @can('insere_centroCusto')
                                                <a href="javascript:deletarRegistro('{{ $c_custo->Codigo }}')"
                                                class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
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
        {{ $centrocusto->links() }}
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
                    url: "{{ url("CentroCusto/excluir") }}" + '/' + id,
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
