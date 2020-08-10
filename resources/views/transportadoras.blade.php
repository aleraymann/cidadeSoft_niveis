@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Telefone").mask("99-9999-9999");
        $("#Comercial").mask("99-9999-9999");
        $("#Celular").mask("99-99999-9999");
        $("#CEP").mask("99999999");
        $("#CPF").mask("99999999999");
        $("#RG").mask("9999999999999");
        $("#FreteM").mask("99999999.99");
        $("#FreteM2").mask("99999999.99");
        $("#FreteM3").mask("99999999.99");
    });

</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Adicionando Javascript CEP-->
<script type="text/javascript">
    $(document).ready(function () {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#Endereco").val("");
            $("#Bairro").val("");
            $("#Cidade").val("");
            $("#Estado").val("");
        }

        //Quando o campo cep perde o foco.
        $("#CEP").blur(function () {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#Endereco").val("...");
                    $("#Bairro").val("...");
                    $("#Cidade").val("...");
                    $("#Estado").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (
                    dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#Endereco").val(dados.logradouro);
                            $("#Bairro").val(dados.bairro);
                            $("#Cidade").val(dados.localidade);
                            $("#Estado").val(dados.uf);

                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
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

    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2">
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Transportadoras
                @can('insere_transp')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Transportadoras
                    </button>
                @endcan
                </h4>

                @include("modals.modal_transportadora")
            </div>
            <div class="form-row col-lg-12">
            <div>
                    <a href="{{ url("/Cadastro/transportadoras") }}" class="btn btn-sm btn-info mt-3 mr-2"> Todos</a>
                </div>
            <div class="form-group col-lg-2">
                         <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                             name="filtro">
                             <option >Filtro de Busca</option>
                             <option value="C">Código</option>
                             <option value="N">Nome Fantasia</option>
                         </select>
                     </div>
            <div  id="name" hidden>
             <form action="{{ url('/Transportadora/busca') }}" method="post">
             <div class=" container">
                <div class="input-group col-lg-10 mt-2">
                  <input type="text" class="form-control" name="criterio" placeholder="Nome Fantasia">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit">OK</button>
                  </div>
                </div>
             </div>
                {{ csrf_field() }} 
                </form> 
            </div>

            <div id="cod" hidden>
                <form action="{{ url('/Transportadora/busca2') }}" method="post">
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
            </div>
            @if($criterio != "")
                <div class="card-body">
                    <h5>Encontrado com: "{{ $criterio }}" </h5>
                </div>
             @endif
             
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Nome Fantasia</th>
                                <th class="">Tipo</th>
                                <th class="">Email</th>
                                <th class="">Cod. Empresa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transportadora as $trans)
                                    @can('view_transp', $trans)
                                        <tr>
                                            <td class=""> {{ $trans->Codigo }} </td>
                                            <td class=""> {{ $trans->Nome_Fantasia }} </td>
                                            <td class="">
                                                {{ $trans->Fis_Jur=="F"? "Física":"Jurídica" }}
                                            </td>
                                            <td> {{ $trans->Email }} </td>
                                            <td> {{ $trans->Empresa }} </td>
                                            <td class="">
                                                <div class="btn-group" role="group">
                                                    @can('edita_transp')
                                                    <a href='{{ url("/Transportadora/editar/$trans->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                            <i class='far fa-edit'></i>
                                                        </a>
                                                    @endcan
                                                    @can('view_transp',$trans)
                                                    <a href='{{ url("/Transportadora/vizualizar/$trans->Codigo") }}' class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;">
                                                            <i class='far fa-eye'></i>
                                                        </a>
                                                    @endcan
                                                    @can('deleta_transp')
                                                    <a href="javascript:deletarRegistro('{{ $trans->Codigo }}')" class="btn btn-danger btn-xs" style="border-radius:2px;">
                                                            <i class='far fa-trash-alt'></i>
                                                    </a>
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
        {{ $transportadora->links() }}
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
                        url: "{{ url("Transportadora/excluir") }}" + '/' + id,
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
            
         } else if (value == "N") {
            cod.hidden = true;
             name.hidden = false;
         }
     };
 </script>
