@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/movimento")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left mt-2">
                   Data: {{ $data_movimento->Data }}
                </h4>
                @can('insere_mov')
                <button type="button" class="btn btn-success btn-rounded float-right mr-2" data-toggle="modal"
                        data-target="#myModaldata">
                        <i class='fas fa-plus'></i> Movimento
                    </button>
                @include("modals.modal_movimento")
                @endcan
            </div>
            <div class="form-row col-sm-12">
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Código</option>
                        <option value="D">Especie</option>
                        <option value="P">Documento</option>
                    </select>
                </div>
                <div id="name" hidden>
                    <form action="{{ url('/Movimento/busca') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                            <select class="form-control input-border-bottom" id="criterio"
                                name="criterio">
                                    <option >Selecione</option>
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cheque</option>
                                    <option value="3">Cartão</option>
                                </select>
                                <div class="input-group-append mr-2">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                
                <div id="cod" hidden>
                    <form action="{{ url('/Movimento/busca2') }}" method="post">
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
                    <form action="{{ url('/Movimento/busca3') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                            <select class="form-control input-border-bottom" id="criterio"
                                name="criterio">
                                <option>Selecione</option>
                                <option value="REC">Recibo</option>
                                <option value="NFF">Nota Fiscal</option>
                            </select>
                                <div class="input-group-append mr-2">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    
                </div>
               </div>
            <div class="card-body">
            <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th class="">Espécie</th>
                                <th class="">Documento</th>
                                <th class="">Número do Documento</th>
                                <th class="">Valor</th>
                                <th class="">Operador</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($conta_movimento as $c)
                        @if($c->data_id == $data_movimento->Codigo)
                           <tr>
                            <td class="">{{ $c->Codigo }}  </td>
                               @if( $c->Especie===1)
                            <td> Dinheiro </td>
                                @elseif( $c->Especie===2)
                            <td> Cheque </td>
                                @else
                            <td> Cartão </td>
                                @endif
                               <td class="">{{ $c->Documento == "NFF"? "Nota Fiscal": "Recibo" }}  </td>
                               <td class="">{{ $c->Num_Doc }}  </td>
                               <td class="">{{ $c->Valor }}  </td>
                               <td class="">{{ $c->Operador=="C"? "Crédito" : "Débito" }}  </td>
                               <td class="">{{ $c->user_id }}  </td>
                              
                               <td class="">
                                   <div class="btn-group" role="group">
                                   @can('edita_mov')
                                   <a href='{{ url("/Movimento/editar/$c->Codigo") }}'
                                   class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                   @endcan
                                   @can('visual_mov')
                                   <a href='{{url("/Movimento/visualizar/$c->Codigo")}}' class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;">
                                   <i class='far fa-eye'></i></a>
                                   @endcan
                                   @can('deleta_mov')
                                   <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                   class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
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


    @endsection
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
                    url: "{{ url("Movimento/excluir") }}" + '/' + id,
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
            if (value == "C") {
                cod.hidden = false;
                name.hidden = true;
                pag.hidden = true;

            } else if (value == "D") {
                cod.hidden = true;
                name.hidden = false;
                pag.hidden = true;
            }else if (value == "P") {
                cod.hidden = true;
                name.hidden = true;
                pag.hidden = false;
            }
        };
    </script>
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