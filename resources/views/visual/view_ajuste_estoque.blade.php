@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ajuste_estoque")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left mt-2">
                  Data: {{ $ajuste_estoque->Data }}
                </h4>
                @can('insere_ajuste_item')
                <button type="button" class="btn btn-success btn-rounded float-right mr-2" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Item ajustado
                    </button>
                @endcan
                
                @include('modals.modal_ajuste_item')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados do Ajuste</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Situação</b>
                                    <label>{{ $ajuste_estoque->Situacao }}</label><br>

                                <b class="ls-label-text">Tipo do Movimento:</b>
                                <label>{{ $ajuste_estoque->Tipo_Mov=="S"?"Saída":"Entrada" }}</label><br>

                                <b class="ls-label-text">Justificativa:</b>
                                    <label>{{ $ajuste_estoque->Justificativa }} </label><br>
                            </td>
                            <td>
                                    
                                <b class="ls-label-text">Cod do Funcionário:</b>
                                    <label>{{ $ajuste_estoque->Cod_Fun }} </label><br>

                                    
                                <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $ajuste_estoque->Cod_CliFor }} </label><br>

                                    
                                <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $ajuste_estoque->Empresa }} </label><br>
                               
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
  
    <div class="form-row col-sm-12">
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Código</option>
                        <option value="D">Cod de Ref</option>
                        <option value="P">Cod do Item</option>
                    </select>
                </div>
                <div id="name" hidden>
                    <form action="{{ url('/AjusteItem/busca') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-12 mt-2">
                            <input type="text" class="form-control" name="criterio" placeholder="Código Ref">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                
                <div id="cod" hidden>
                    <form action="{{ url('/AjusteItem/busca2') }}" method="post">
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
                    <form action="{{ url('/AjusteItem/busca3') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                            <input type="text" class="form-control" name="criterio" placeholder="Código do Item">
                                <div class="input-group-append ml-2">
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
                                <th class="">Cod de Ref</th>
                                <th class="">Cod do Item</th>
                                <th class="">Quantidade</th>
                                <th class="">Preço Unitário</th>
                                <th class="">Valor Total</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($ajuste_item as $c)
                        @if($c->Cod_Ajuste == $ajuste_estoque->Codigo)
                        @can('view_ajuste_item', $c)
                           <tr>
                            <td class="">{{ $c->Codigo }}  </td>
                               <td class="">{{ $c->Cod_Ref }}  </td>
                               <td class="">{{ $c->Cod_Item }}  </td>
                               <td class="">{{ $c->Qtd }}  </td>
                               <td class="">{{ $c->Preco }}  </td>
                               <td class="">{{ $c->Total }}  </td>
                               <td class="">{{ $c->user_id }}  </td>
                              
                               <td class="">
                                   <div class="btn-group" role="group">
                                   @can('edita_ajuste_item')
                                   <a href='{{ url("/AjusteItem/editar/$c->Codigo") }}'
                                   class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                   @endcan
                                   @can('deleta_ajuste_item')
                                   <a href="javascript:deletarRegistro('{{ $c->Codigo }}')"
                                   class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
                                    @endcan
                                   </div>
                               </td>
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
                    url: "{{ url("AjusteItem/excluir") }}" + '/' + id,
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

    @endsection
