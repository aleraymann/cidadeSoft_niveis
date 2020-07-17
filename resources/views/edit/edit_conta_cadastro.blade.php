@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_Banco").mask("999999");
        $("#Dig_Banco").mask("99");
        $("#Cod_Banco_Cob").mask("999999");
        $("#Dig_Banco_Cob").mask("99");
        $("#Cod_Age").mask("999999");
        $("#Dig_Age").mask("99");
        $("#CC").mask("999999");
        $("#Digito").mask("99");
        $("#Carteira").mask("99");
        $("#Uso_Bco").mask("9999");
        $("#Cod_Moeda").mask("99");
        $("#Dias_Desc").mask("99");
        $("#Perc_Desc").mask("9.99");
        $("#Perc_Multa").mask("9.99");
        $("#Perc_Juros").mask("9.99");
        $("#Dias_AvisoProt").mask("99");
        $("#Dias_Prot").mask("99");
        $("#Tx_Emissao").mask("9.99");
    });

</script>



<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/conta") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Conta
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Conta/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Conta/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Descricao	">Descrição da Conta:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                                placeholder="" required minlength="2" maxlength="45"
                                value="{{ isset($contacadastro->Descricao) ? $contacadastro->Descricao : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cod_Banco">Número do Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Banco" id="Cod_Banco"
                                placeholder="" required minlength="1" maxlength="6"
                                value="{{ isset($contacadastro->Cod_Banco) ? $contacadastro->Cod_Banco : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Dig_Banco">Dígito do Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dig_Banco" id="Dig_Banco"
                                required
                                value="{{ isset($contacadastro->Dig_Banco) ? $contacadastro->Dig_Banco : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Nome_Banco">Nome do Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Nome_Banco"
                                id="Nome_Banco" placeholder="" required minlength="2" maxlength="20"
                                value="{{ isset($contacadastro->Nome_Banco) ? $contacadastro->Nome_Banco : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Cod_Banco_Cob">Número do Banco Cobrador:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Banco_Cob"
                                id="NomCod_Banco_Cobe_Banco" placeholder="" required minlength="2" maxlength="6"
                                value="{{ isset($contacadastro->Cod_Banco_Cob) ? $contacadastro->Cod_Banco_Cob : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Dig_Banco_Cob">Dídigo do Banco Cobrador:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dig_Banco_Cob"
                                id="Dig_Banco_Cob" required
                                value="{{ isset($contacadastro->Dig_Banco_Cob) ? $contacadastro->Dig_Banco_Cob : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Praca">Município do Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Praca" id="Praca"
                                placeholder="" required minlength="2" maxlength="50"
                                value="{{ isset($contacadastro->Praca) ? $contacadastro->Praca : '' }} ">
                            <div class="invalid-feedback">
                                Por favor,Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cod_Age">Agência:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Age" id="Cod_Age"
                                placeholder="" required minlength="2" maxlength="6"
                                value="{{ isset($contacadastro->Cod_Age) ? $contacadastro->Cod_Age : '' }} ">
                            <div class="invalid-feedback">
                                Por favor,Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1">
                            <b class="ls-label-text" for="Dig_Age">DV:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dig_Age" id="Dig_Age"
                                placeholder="" required minlength="2" maxlength="2"
                                value="{{ isset($contacadastro->Dig_Age) ? $contacadastro->Dig_Age : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1"></div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="CC">Conta:</b>
                            <input type="text" class="form-control input-border-bottom" name="CC" id="CC" placeholder=""
                                required minlength="2" maxlength="6"
                                value="{{ isset($contacadastro->CC) ? $contacadastro->CC : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1">
                            <b class="ls-label-text" for="Digito">DV:</b>
                            <input type="text" class="form-control input-border-bottom" name="Digito" id="Digito"
                                placeholder="" required minlength="2" maxlength="2"
                                value="{{ isset($contacadastro->Digito) ? $contacadastro->Digito : '' }} ">
                            <div class="invalid-feedback">
                                Por favor,Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1"></div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tipo_Conta">Tipo de Conta:</b>
                            <select class="form-control input-border-bottom" id="Tipo_Conta" name="Tipo_Conta">
                                <option
                                    value="{{ isset($contacadastro->Tipo_Conta) ? $contacadastro->Tipo_Conta : '' }} ">
                                    {{ $contacadastro->Tipo_Conta=="C"?"Caixa":"Banco" }}
                                </option>
                                <option value="C">Caixa</option>
                                <option value="B">Banco</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tipo_Cobranca">Tipo de Cobrança:</b>
                            <select class="form-control input-border-bottom" id="Tipo_Cobranca" name="Tipo_Cobranca">
                                <option
                                    value="{{ isset($contacadastro->Tipo_Cobranca) ? $contacadastro->Tipo_Cobranca : '' }} ">
                                    {{ $contacadastro->Tipo_Cobranca }}</option>
                                <option value="BB">BB</option>
                                <option value="Bradesco">Bradesco</option>
                                <option value="Caixa">Caixa</option>
                                <option value="SICOOBCaixa">SICOOB Caixa</option>
                                <option value="SICOOBBradesco">SICOOB Bradesco</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Cedente">Código do Cedente:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Cedente"
                                id="Cod_Cedente" placeholder="" minlength="1" maxlength="15"
                                value="{{ isset($contacadastro->Cod_Cedente) ? $contacadastro->Cod_Cedente : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Convenio">Num do Convenio da Cobrança:</b>
                            <input type="text" class="form-control input-border-bottom" name="Convenio" id="Convenio"
                                placeholder="" minlength="1" maxlength="15"
                                value="{{ isset($contacadastro->Convenio) ? $contacadastro->Convenio : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Carteira">Num do Carteira da Cobrança:</b>
                            <input type="text" class="form-control input-border-bottom" name="Carteira" id="Carteira"
                                placeholder="" minlength="1" maxlength="2"
                                value="{{ isset($contacadastro->Carteira) ? $contacadastro->Carteira : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Uso_Bco">Cod. de uso do Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Uso_Bco" id="Uso_Bco"
                                placeholder="" minlength="1" maxlength="4"
                                value="{{ isset($contacadastro->Uso_Bco) ? $contacadastro->Uso_Bco : '' }} ">
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
                            <b class="ls-label-text" for="Cod_Moeda">Cod. Moeda:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cod_Moeda" id="Cod_Moeda"
                                value="{{ isset($contacadastro->Cod_Moeda) ? $contacadastro->Cod_Moeda : '' }} "
                                placeholder="" minlength="1" maxlength="4">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Especie">Espec. Moeda:</b>
                            <input type="text" class="form-control input-border-bottom" name="Especie" id="Especie"
                                value="{{ isset($contacadastro->Especie) ? $contacadastro->Especie : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Especie_Doc">Espec. Documento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Especie_Doc"
                                id="Especie_Doc"
                                value="{{ isset($contacadastro->Especie_Doc) ? $contacadastro->Especie_Doc : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Aceite">Aceite de Cobrança:</b>
                            <select class="form-control input-border-bottom" id="Aceite" name="Aceite">
                                <option
                                    value="{{ isset($contacadastro->Aceite) ? $contacadastro->Aceite : '' }} ">
                                    {{ $contacadastro->Aceite=="S"?"Sim":"Não" }}
                                </option>
                                <option value="N">Não</option>
                                <option value="S">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Local_Pgto">Local de pagamento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Local_Pgto"
                                id="Local_Pgto"
                                value="{{ isset($contacadastro->Local_Pgto) ? $contacadastro->Local_Pgto : '' }} "
                                placeholder="" minlength="2" maxlength="60">
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
                            <b class="ls-label-text" for="Dias_Desc">Dias de Desconto :</b>
                            <input type="text" class="form-control input-border-bottom" name="Dias_Desc" id="Dias_Desc"
                                value="{{ isset($contacadastro->Dias_Desc) ? $contacadastro->Dias_Desc : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Perc_Desc">Perc. de Desconto :</b>
                            <input type="text" class="form-control input-border-bottom" name="Perc_Desc" id="Perc_Desc"
                                value="{{ isset($contacadastro->Perc_Desc) ? $contacadastro->Perc_Desc : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Perc_Multa">Perc. de Multa :</b>
                            <input type="text" class="form-control input-border-bottom" name="Perc_Multa"
                                id="Perc_Multa"
                                value="{{ isset($contacadastro->Perc_Multa) ? $contacadastro->Perc_Multa : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Perc_Juros">Perc. de Juros :</b>
                            <input type="text" class="form-control input-border-bottom" name="Perc_Juros"
                                id="Perc_Juros"
                                value="{{ isset($contacadastro->Perc_Juros) ? $contacadastro->Perc_Juros : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Dias_AvisoProt">Dias aviso Protesto :</b>
                            <input type="text" class="form-control input-border-bottom" name="Dias_AvisoProt"
                                id="Dias_AvisoProt"
                                value="{{ isset($contacadastro->Dias_AvisoProt) ? $contacadastro->Dias_AvisoProt : '' }} "
                                placeholder="" minlength="1" maxlength="2">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Dias_Prot">Dias a enviar Protesto :</b>
                            <input type="text" class="form-control input-border-bottom" name="Dias_Prot" id="Dias_Prot"
                                value="{{ isset($contacadastro->Dias_Prot) ? $contacadastro->Dias_Prot : '' }} "
                                placeholder="" minlength="1" maxlength="2">
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
                            <b class="ls-label-text" for="Tx_Emissao">Taxa de Emissão :</b>
                            <input type="text" class="form-control input-border-bottom" name="Tx_Emissao"
                                id="Tx_Emissao" onblur="tx_Emissao()"
                                value="{{ isset($contacadastro->Tx_Emissao) ? $contacadastro->Tx_Emissao : '' }} "
                                placeholder="" minlength="1" maxlength="3">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Empresa">Empresa:</b>
                            <select class="form-control input-border-bottom" required id="Empresa" name="Empresa">
                                @foreach($empresa as $empresa)
                                @can('view_empresa', $empresa)
                                    <option value="{{ $empresa->Codigo }}"
                                        {{ $contacadastro->Empresa == $empresa->Codigo ? "selected" : "" }}>
                                        {{ $empresa->Nome_Fantasia }}</option>
                                @endcan
                                @endforeach
                            </select>
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
                        <a href="{{ url("/Cadastro/conta") }}" class="btn btn-danger ml-3">Cancelar</a>
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
    @endsection
    <script type="text/javascript">
 
 function tx_Emissao() {
        var desc = parseFloat(document.getElementById('Tx_Emissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Tx_Emissao').value = lim;
    }
</script>