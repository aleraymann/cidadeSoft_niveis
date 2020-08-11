@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

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
                <h4 class="card-title">Ajuste de Estoque
                @can('insere_ajuste_est')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Ajuste
                    </button>
                @endcan
                </h4>

                @include("modals.modal_ajuste_estoque")
            </div>
            <div class="form-row col-lg-12">
                <div>
                    <a href="{{ url("/Cadastro/ajuste_estoque") }}" class="btn btn-sm btn-info mt-3 mr-2">Todos</a>
                </div>
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Código</option>
                        <option value="D">Data do Acerto</option>
                        <option value="P">Situação</option>
                        <option value="B">Tipo de Movimento</option>
                    </select>
                </div>
                <div id="name" hidden>
                    <form action="{{ url('/AjusteEstoque/busca') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-12 mt-2">
                            <b class="mt-2">Início:</b>
                                <input type="date" class="form-control ml-1" name="data_inicio">
                            <b class="ml-2 mt-2">Fim:</b>
                                <input type="date" class="form-control ml-1 mr-2" name="data_fim">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                
                <div id="cod" hidden>
                    <form action="{{ url('/AjusteEstoque/busca2') }}" method="post">
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
                <div id="pag_rec" hidden>
                    <form action="{{ url('/AjusteEstoque/busca3') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                            <select class="form-control input-border-bottom" id="criterio"
                                name="criterio">
                                <option>Selecione</option>
                                <option value="Aberto">Aberto</option>
                                <option value="Executado">Executado</option>
                            </select>
                                <div class="input-group-append ml-2">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    
                </div>
                <div id="conc" hidden>
                    <form action="{{ url('/AjusteEstoque/busca4') }}" method="post">
                        <div class="container">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                                <select class="form-control input-border-bottom" id="criterio"
                                name="criterio">
                                <option>Selecione</option>
                                <option value="E">Entrada</option>
                                <option value="S">Saída</option>
                            </select>
                                <div class="input-group-append ml-2">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
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
                                <th class="">Data</th>
                                <th class="">Situação</th>
                                <th class="">Tipo de Movimento</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($ajuste_estoque as $ajuste)
                                @can('view_ajuste_est', $ajuste)
                                    <tr>
                                    <td> {{ $ajuste->Codigo }} </td>
                                    <td>   {{ date('d-m-Y', strtotime($ajuste->Data)) }} </td>
                                    <td> {{ $ajuste->Situacao }} </td>
                                    <td> {{ $ajuste->Tipo_Mov =="S"? "Saída":"Entrada" }} </td>
                                    <td> {{ $ajuste->user_id }} </td>
                                    <td>
                                            <div class="btn-group" role="group">
                                            @can('edita_ajuste_est')
                                                <a href='{{ url("/AjusteEstoque/editar/$ajuste->Codigo") }}'
                                                class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                            @endcan
                                            @can('visual_ajuste_est')
                                            <a href='{{ url("/AjusteEstoque/visualizar/$ajuste->Codigo") }}'
                                            class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;"><i class='far fa-eye'></i></a>
                                        @endcan
                                            @can('deleta_ajuste_est')
                                                    <a href="javascript:deletarRegistro('{{$ajuste->Codigo}}')"
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
        {{ $ajuste_estoque->links() }}
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
                    url: "{{ url("AjusteEstoque/excluir") }}" + '/' + id,
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
            var pag = document.getElementById("pag_rec");
            var conc = document.getElementById("conc");
            if (value == "C") {
                cod.hidden = false;
                name.hidden = true;
                pag.hidden = true;
                conc.hidden = true;

            } else if (value == "D") {
                cod.hidden = true;
                name.hidden = false;
                pag.hidden = true;
                conc.hidden = true;
            }else if (value == "P") {
                cod.hidden = true;
                name.hidden = true;
                pag.hidden = false;
                conc.hidden = true;
            }
            else if (value == "B") {
                conc.hidden = false;
                cod.hidden = true;
                name.hidden = true;
                pag.hidden = true;
            }
        };
    </script>