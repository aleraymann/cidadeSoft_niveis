<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Conta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
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
            <div class="form-group col-lg-12" hidden>
              <b class="ls-label-text" for="user_id">User_ID:</b>
              <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
              readonly   value="
                            @if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
                            @else
                            {{ Auth::user()->adm }}
                            @endif" >
            </div>
          </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Descricao	">Descrição da Conta:</b>
                        <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                            placeholder="" required minlength="2" maxlength="45">
                        <div class="invalid-feedback">
                            Por favor, Mínimo 2 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Cod_Banco">Número do Banco:</b>
                        <input type="text" class="form-control input-border-bottom" name="Cod_Banco" id="Cod_Banco"
                            placeholder="" required minlength="1" maxlength="6">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Dig_Banco">Dígito do Banco:</b>
                        <input type="number" class="form-control input-border-bottom" name="Dig_Banco" id="Dig_Banco"
                            required>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Nome_Banco">Nome do Banco:</b>
                        <input type="text" class="form-control input-border-bottom" name="Nome_Banco" id="Nome_Banco"
                            placeholder="" required minlength="2" maxlength="20">
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
                            id="NomCod_Banco_Cobe_Banco" placeholder="" required minlength="2" maxlength="6">
                        <div class="invalid-feedback">
                            Por favor, Mínimo 2 caracteres!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Dig_Banco_Cob">Dídigo do Banco Cobrador:</b>
                        <input type="number" class="form-control input-border-bottom" name="Dig_Banco_Cob"
                            id="Dig_Banco_Cob" required>
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
                            placeholder="" required minlength="2" maxlength="50">
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
                            placeholder="" required minlength="2" maxlength="6">
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
                            placeholder="" required minlength="1" maxlength="2">
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
                            required minlength="2" maxlength="6">
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
                            placeholder="" required minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor,Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Tipo_Conta">Tipo de Conta:</b>
                        <select class="form-control input-border-bottom" id="Tipo_Conta" name="Tipo_Conta">
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
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Tipo_Cobranca">Tipo de Cobrança:</b>
                        <select class="form-control input-border-bottom" id="Tipo_Cobranca" name="Tipo_Cobranca">
                            <option value="">Selecione</option>
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
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Cod_Cedente">Código do Cedente:</b>
                        <input type="text" class="form-control input-border-bottom" name="Cod_Cedente" id="Cod_Cedente"
                            placeholder="" minlength="1" maxlength="15">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Convenio">Num do Convenio da Cobrança:</b>
                        <input type="text" class="form-control input-border-bottom" name="Convenio" id="Convenio"
                            placeholder="" minlength="1" maxlength="15">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Carteira">Num do Carteira da Cobrança:</b>
                        <input type="text" class="form-control input-border-bottom" name="Carteira" id="Carteira"
                            placeholder="" minlength="1" maxlength="2">
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
                            placeholder="" minlength="1" maxlength="4">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <b class="ls-label-text" for="Cod_Moeda">Cod. Moeda:</b>
                        <input type="number" class="form-control input-border-bottom" name="Cod_Moeda" id="Cod_Moeda"
                            value="9" placeholder="" minlength="1" maxlength="4">
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
                            value="R$" placeholder="" minlength="1" maxlength="2">
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
                        <b class="ls-label-text" for="Especie_Doc">Espec. Documento:</b>
                        <input type="text" class="form-control input-border-bottom" name="Especie_Doc" id="Especie_Doc"
                            value="DM" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Aceite">Aceite de Cobrança:</b>
                        <select class="form-control input-border-bottom" id="Aceite" name="Aceite">
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
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Local_Pgto">Local de pagamento:</b>
                        <input type="text" class="form-control input-border-bottom" name="Local_Pgto" id="Local_Pgto"
                            value="PAGÁVEL EM QUALQUER BANCO ATE O VENCIMENTO" placeholder="" minlength="2"
                            maxlength="60">
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
                        <b class="ls-label-text" for="Dias_Desc">Dias de Desconto:</b>
                        <input type="number" class="form-control input-border-bottom" name="Dias_Desc" id="Dias_Desc"
                            value="0" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Perc_Desc">Perc. de Desconto:</b>
                        <input type="text" class="form-control input-border-bottom" name="Perc_Desc" id="Perc_Desc"
                            value="0.00" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Perc_Multa">Perc. de Multa:</b>
                        <input type="text" class="form-control input-border-bottom" name="Perc_Multa" id="Perc_Multa"
                            value="0.00" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Perc_Juros">Perc. de Juros:</b>
                        <input type="text" class="form-control input-border-bottom" name="Perc_Juros" id="Perc_Juros"
                            value="0.00" placeholder="" minlength="1" maxlength="2">
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
                        <b class="ls-label-text" for="Dias_AvisoProt">Dias aviso Protesto :</b>
                        <input type="number" class="form-control input-border-bottom" name="Dias_AvisoProt"
                            id="Dias_AvisoProt" value="0" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Dias_Prot">Dias a enviar Protesto :</b>
                        <input type="number" class="form-control input-border-bottom" name="Dias_Prot" id="Dias_Prot"
                            value="0" placeholder="" minlength="1" maxlength="2">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Tx_Emissao">Taxa de Emissão :</b>
                        <input type="text" class="form-control input-border-bottom" name="Tx_Emissao" 
                        onblur="tx_Emissao()"id="Tx_Emissao"
                            value="0.00" placeholder="" minlength="1" maxlength="3">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Empresa">Empresa:</b>
                        <select class="form-control input-border-bottom" required id="Empresa" name="Empresa">
                            <option value="">Selecione</option>
                            @foreach($empresa as $empresa)
                            @can('view_empresa', $empresa)
                                <option value="{{ $empresa->Codigo }}">{{ $empresa->Razao_Social }}</option>
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
                    <button class="btn btn-success">Cadastrar</button>
                    <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                    </form>
                </div>
            </div>
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
            <!-- Modal footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
 function tx_Emissao() {
        var desc = parseFloat(document.getElementById('Tx_Emissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Tx_Emissao').value = lim;
    }
</script>