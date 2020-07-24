@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Telefone").mask("99-9999-9999");
        $("#Celular").mask("99-99999-9999");
        $("#CEP").mask("99999999");
        $("#CPF").mask("99999999999");
        $("#RG").mask("9999999999999");
        $("#ComiVend").mask("99.99");
        $("#ComiServ").mask("99.99");
        $("#LimDescPV").mask("99.99");
        $("#LimDescPP").mask("99.99");
        $("#idmsgs").mask("99999");
    });

</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Adicionando Javascript CEP-->
<script type="text/javascript">
    jQuery.noConflict();
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

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/funcionarios") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Funcionários
                </h4>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Funcionario/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Funcionario/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Nome">Nome</b>
                            <input type="text" class="form-control input-border-bottom" name="Nome" id="Nome"
                                value="{{ isset($funcionario->Nome) ? $funcionario->Nome : '' }}"
                                placeholder="Nome do Funcionário" required minlength="3" maxlength="45">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="RG">RG:</b>
                            <input type="text" class="form-control input-border-bottom" name="RG" id="RG" minlength="8"
                                maxlength="13"
                                value="{{ isset($funcionario->RG) ? $funcionario->RG : '' }}">
                            <div class="invalid-feedback" placeholder="Somente os números">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="CPF">CPF:</b>
                            <input type="text" class="form-control input-border-bottom" name="CPF" id="CPF"
                                minlength="11" maxlength="13"
                                value="{{ isset($funcionario->CPF) ? $funcionario->CPF : '' }}"
                                onblur="validarCPF(this)">
                            <div class="invalid-feedback" placeholder="Somente os números">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="CEP">CEP</b>
                            <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP"
                                placeholder="Somente os números"
                                value="{{ isset($funcionario->CEP) ? $funcionario->CEP : '' }}">
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cidade">Cidade:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade"
                                placeholder="Cidade"
                                value="{{ isset($funcionario->Cidade) ? $funcionario->Cidade : '' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Endereco">Endereço:</b>
                            <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco"
                                placeholder="Rua, Travessa, Av."
                                value="{{ isset($funcionario->Endereco) ? $funcionario->Endereco : '' }}">
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Bairro">Bairro:</b>
                            <input type="text" class="form-control input-border-bottom" name="Bairro" id="Bairro"
                                placeholder="Bairro"
                                value="{{ isset($funcionario->Bairro) ? $funcionario->Bairro : '' }}">
                        </div>
                        <div class="form-group col-lg-1">
                            <b class="ls-label-text" for="Estado">Estado:</b>
                            <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado"
                                maxlength="2" minlength="2" placeholder="Sigla"
                                value="{{ isset($funcionario->Estado) ? $funcionario->Estado : '' }}">
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Telefone">Telefone:</b>
                            <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone"
                                placeholder="00-0000-0000"
                                value="{{ isset($funcionario->Telefone) ? $funcionario->Telefone : '' }}">
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Celular">Celular:</b>
                            <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular"
                                placeholder="00-00000-0000"
                                value="{{ isset($funcionario->Celular) ? $funcionario->Celular : '' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Email">Email:</b>
                            <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
                                placeholder="algo@algo.com"
                                value="{{ isset($funcionario->Email) ? $funcionario->Email : '' }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Usuario">Usuário:</b>
                            <input type="text" class="form-control input-border-bottom" name="Usuario" id="Usuario"
                                minlength="4" maxlength="15" required placeholder="Mínimo 4 caracteres"
                                value="{{ isset($funcionario->Usuario) ? $funcionario->Usuario : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Senha">Senha:</b>
                            <input type="password" class="form-control input-border-bottom" name="Senha" id="Senha"
                                minlength="4" maxlength="15" required placeholder="Mímino 4 caracteres"
                                value="{{ isset($funcionario->Senha) ? $funcionario->Senha : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="ComiVend">Comissão de Venda:</b>
                            <input type="text" class="form-control input-border-bottom" name="ComiVend" 
                            onblur="com_vend()"id="ComiVend"
                                minlength="3" required placeholder="0.00"
                                value="{{ isset($funcionario->ComiVend) ? $funcionario->ComiVend : '' }}">
                            <div class="invalid-feedback" placeholder="0.00">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="ComiServ">Comissão de Seriços:</b>
                            <input type="text" class="form-control input-border-bottom" name="ComiServ" 
                            onblur="com_serv()"id="ComiServ"
                                minlength="3" required placeholder="0.00"
                                value="{{ isset($funcionario->ComiServ) ? $funcionario->ComiServ : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="LimDescPV">Limite desc à vista:</b>
                            <input type="text" class="form-control input-border-bottom" name="LimDescPV" 
                            onblur="lim_vista()"id="LimDescPV"
                                minlength="3" required placeholder="0.00"
                                value="{{ isset($funcionario->LimDescPV) ? $funcionario->LimDescPV : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="LimDescPP">Limite desc à Prazo:</b>
                            <input type="text" class="form-control input-border-bottom" name="LimDescPP" 
                            onblur="lim_prazo()"id="LimDescPP"
                                minlength="3" required placeholder="0.00"
                                value="{{ isset($funcionario->LimDescPP) ? $funcionario->LimDescPP : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="idmsgs">Num de Ident. para abrir chamados:</b>
                            <input type="text" class="form-control input-border-bottom" name="idmsgs" id="idmsgs"
                                required
                                value="{{ isset($funcionario->idmsgs) ? $funcionario->idmsgs : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/funcionarios") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <script type="text/javascript">
                            $('input').on("keypress", function (e) {
                                /* ENTER PRESSED*/
                                if (e.keyCode == 13) {
                                    /* FOCUS ELEMENT */
                                    var inputs = $(this).parents("form").eq(0).find(":input");
                                    var idx = inputs.index(this);

                                    if (idx == inputs.length - 1) {
                                        inputs[0].select()
                                    } else {
                                        inputs[idx + 1].focus(); //  handles submit buttons

                                    }
                                    return false;
                                }
                            });

                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        if (strCPF == "11111111111") return false;
        if (strCPF == "22222222222") return false;
        if (strCPF == "33333333333") return false;
        if (strCPF == "44444444444") return false;
        if (strCPF == "55555555555") return false;
        if (strCPF == "66666666666") return false;
        if (strCPF == "77777777777") return false;
        if (strCPF == "88888888888") return false;
        if (strCPF == "99999999999") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }
    alert(TestaCPF(strCPF));


    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("CPF inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido

        }
    }
    function lim_prazo() {
        var desc = parseFloat(document.getElementById('LimDescPP').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimDescPP').value = lim;
    }

    function lim_vista() {
        var desc = parseFloat(document.getElementById('LimDescPV').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimDescPV').value = lim;
    }

    function com_vend() {
        var desc = parseFloat(document.getElementById('ComiVend').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ComiVend').value = lim;
    }

    function com_serv() {
        var desc = parseFloat(document.getElementById('ComiServ').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ComiServ').value = lim;
    }

</script>
