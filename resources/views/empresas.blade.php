@extends("template")
@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Telefone").mask("99-9999-9999");
        $("#Celular").mask("99-99999-9999");
        $("#FAX").mask("99-9999-9999");
        $("#CEP").mask("99999999");
        $("#CPF").mask("999.999.999-99");
        $("#RG").mask("9999999999999");
        $("#CNPJ").mask("99.999.999/9999-99");
        $("#SMTP_Porta").mask("99999");
        $("#CNAE").mask("9999999999");
        $("#FTP_Porta").mask("99999");
        $("#Fin_CFixos").mask("9.99", {
            reverse: true
        });
        $("#Fin_Desloc").mask("9.99", {
            reverse: true
        });
        $("#Fin_Comissao").mask("9.99", {
            reverse: true
        });
        $("#Fin_Inad").mask("9.99", {
            reverse: true
        });
        $("#Fin_Lucro").mask("9.99", {
            reverse: true
        });
        $("#Fin_DescPV").mask("9.99", {
            reverse: true
        });
        $("#Fin_PerDano").mask("9.99", {
            reverse: true
        });
        $("#Fin_JurosPadrao").mask("9.99", {
            reverse: true
        });
        $("#Fin_MultaPadrao").mask("9.99", {
            reverse: true
        });
        $("#Fisc_ICMS").mask("9.99", {
            reverse: true
        });
        $("#Fisc_PIS").mask("9.99", {
            reverse: true
        });
        $("#Fisc_COFINS").mask("9.99", {
            reverse: true
        });
        $("#Fisc_ISSQN").mask("9.99", {
            reverse: true
        });
        $("#Fisc_IRPJ").mask("9.99", {
            reverse: true
        });
        $("#Fisc_CSLL").mask("9.99", {
            reverse: true
        });
        $("#Fisc_Simples").mask("9.99", {
            reverse: true
        });
        $("#NFe_Porta").mask("99999");
        $("#NFe_Modelo").mask("999");
        $("#NFe_Versao").mask("9.99", {
            reverse: true
        });
        $("#NFCe_Modelo").mask("999");
        $("#NFCe_Versao").mask("9.99", {
            reverse: true
        });
        $("#NFCe_idToken").mask("99999999999");
        $("#Ctb_contCPF").mask("99999999999");
        $("#Ctb_ContFone").mask("99-9999-9999");
        $("#Vend_DiasLocacao").mask("99999");
        $("#Vend_ProgPtos").mask("99999999.99");
        $("#Vend_VlrHora").mask("99999999.99");
        $("#Vend_VlrMinimo").mask("99999999.99");
        $("#Cfg_TranSeq").mask("9999999999");
        $("#Clifor_saida").mask("99999");
        $("#Clifor_entrada").mask("99999");
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
            $("#Cod_IBGE").val("");
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
                    $("#Cod_IBGE").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (
                        dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#Endereco").val(dados.logradouro);
                            $("#Bairro").val(dados.bairro);
                            $("#Cidade").val(dados.localidade);
                            $("#Estado").val(dados.uf);
                            $("#Cod_IBGE").val(dados.ibge);

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
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Empresas
                    @can("insere_empresa",$empresas)
                        <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                            data-target="#myModal">
                            <i class='fas fa-plus'></i> Empresas
                        </button>
                    @endcan
                </h4>
                @include("modals.modal_empresas")
            </div>
            <div class="form-row col-lg-12">
            <div>
                    <a href="{{ url("/Cadastro/empresas") }}" class="btn btn-sm btn-info mt-3 mr-2"> Todos</a>
                </div>
                    <div class="form-group col-lg-2">
                         <select onchange="verifica(this.value)" class="form-control input-border-bottom" id="filtro"
                             name="filtro">
                             <option >Filtro de Busca</option>
                             <option value="C">Código</option>
                             <option value="N">Nome Fantasia</option>
                         </select>
                     </div>
            <div  id="name" hidden>
             <form action="{{ url('/Empresa/busca') }}" method="post">
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
                <form action="{{ url('/Empresa/busca2') }}" method="post">
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
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-sm table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Logo</th>
                                <th class="">Nome Fantasia</th>
                                <th class="">Razão Social</th>
                                <th class="">CNPJ</th>
                                <th class="">User</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($empresas as $emp)
                                    @can("view_empresa",$emp)
                                        <tr>
                                            <td> {{ $emp->Codigo }} </td>
                                        @if($emp->Logo != null)
                                            <td><img src="{{ url("storage/empresas/{$emp->Logo}") }}" style="max-width:30px; height:30px" ></td>
			                            @else
				                        <td> <img src="{{url("img/empresa_padrao.jpg")}}"  style="max-width:30px; height:30px"></td>
			                            @endif
                                            <td> {{ $emp->Nome_Fantasia }} </td>
                                            <td> {{ $emp->Razao_Social }} </td>
                                            <td> {{ $emp->CNPJ }} </td>
                                            <td> {{ $emp->user_id }} </td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    @can('edita_empresa')
                                                        <a href='{{ url("/Empresa/editar/$emp->Codigo") }}' class="btn btn-success btn-xs mr-2" style="border-radius:2px;">
                                                            <i class='far fa-edit'></i>
                                                        </a>
                                                    @endcan
                                                    @can("visual_empresa")
                                                        <a href='{{ url("/Empresa/vizualizar/$emp->Codigo") }}' class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;">
                                                            <i class='far fa-eye'></i>
                                                        </a>
                                                    @endcan
                                                    @can('deleta_empresa')
                                                        <a href="javascript:deletarRegistro('{{ $emp->Codigo }}')" class="btn btn-danger btn-xs" style="border-radius:2px;">
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
        {{ $empresas->links() }}
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
                    url: "{{ url("Empresa/excluir") }}" + '/' + id,
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
     function verifica(value) {
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