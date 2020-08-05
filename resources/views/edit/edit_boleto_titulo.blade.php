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
<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/boleto_titulo") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Título
                </h4>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Boleto_titulo/salvar") }}">
                        @else
                            <form method="post"
                                action="{{ url("/Boleto_titulo/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">

                        <div class="form-group col-lg-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="Sel" name="Sel" value="1" <?php if($boleto_titulo->Sel == '1'){ echo "checked"; } ?>> Baixa/Envio ao Banco
                        </label>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                            <select class="form-control input-border-bottom" id="Cod_Conta" name="Cod_Conta">
                                <option value="0">Selecione</option>
                                @foreach($conta as $conta)
                                @can('view_conta', $conta)
                                    <option value="{{ $conta->Codigo }}"
                                        {{ $boleto_titulo->Cod_Conta == $conta->Codigo ? "selected" : "" }}>
                                        Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} /
                                        CC:{{ $conta->CC }}-{{ $conta->Digito }}</option>
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data_Doc">Data do Documento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Data_Doc" id="Data_Doc"
                                value="{{ isset($boleto_titulo->Data_Doc) ? $boleto_titulo->Data_Doc : '' }}"
                                required readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Vencimento">Data de Vencimento</b>
                            <input type="date" class="form-control input-border-bottom" name="Vencimento"
                                id="Vencimento" required
                                value="{{$boleto_titulo->Vencimento}}">
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
                            <b class="ls-label-text" for="Nro_Doc">Num do Doc no Banco:</b>
                            <input type="text" class="form-control input-border-bottom" name="Nro_Doc" id="Nro_Doc"
                                required maxlength="14" min="10"
                                value="{{ isset($boleto_titulo->Nro_Doc) ? $boleto_titulo->Nro_Doc : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Nosso_Num">Num do Titulo no Sistema:</b>
                            <input type="text" class="form-control input-border-bottom" name="Nosso_Num" id="Nosso_Num"
                                required maxlength="20" min="10"
                                value="{{ isset($boleto_titulo->Nosso_Num) ? $boleto_titulo->Nosso_Num : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Valor">Valor:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" required
                                maxlength="10" min="3" onblur="valor()"
                                value="{{ isset($boleto_titulo->Valor) ? $boleto_titulo->Valor : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Msg_1">Mensagem a ser impressa 1:</b>
                            <input type="text" class="form-control input-border-bottom" name="Msg_1" id="Msg_1" required
                                maxlength="45" min="5"
                                value="{{ isset($boleto_titulo->Msg_1) ? $boleto_titulo->Msg_1 : '' }}">
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
                            <b class="ls-label-text" for="Msg_2">Mensagem a ser impressa 2:</b>
                            <input type="text" class="form-control input-border-bottom" name="Msg_2" id="Msg_2" required
                                maxlength="45" min="5"
                                value="{{ isset($boleto_titulo->Msg_2) ? $boleto_titulo->Msg_2 : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Msg_3">Mensagem a ser impressa 3:</b>
                            <input type="text" class="form-control input-border-bottom" name="Msg_3" id="Msg_3" required
                                maxlength="45" min="5"
                                value="{{ isset($boleto_titulo->Msg_3) ? $boleto_titulo->Msg_3 : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Inst_1">Instruçao para cobrança 1:</b>
                            <input type="text" class="form-control input-border-bottom" name="Inst_1" id="Inst_1"
                                required maxlength="5" min="1"
                                value="{{ isset($boleto_titulo->Inst_1) ? $boleto_titulo->Inst_1 : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Inst_2">Instruçao para cobrança 2:</b>
                            <input type="text" class="form-control input-border-bottom" name="Inst_2" id="Inst_2"
                                required maxlength="5" min="1"
                                value="{{ isset($boleto_titulo->Inst_2) ? $boleto_titulo->Inst_2 : '' }}">
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
                            <b class="ls-label-text" for="Multa">Percentual de Multa:</b>
                            <input type="text" class="form-control input-border-bottom" name="Multa" id="Multa" required
                                maxlength="3" min="3" onblur="multa()"
                                value="{{ isset($boleto_titulo->Multa) ? $boleto_titulo->Multa : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Taxa_Juros">Percentual de Juros:</b>
                            <input type="text" class="form-control input-border-bottom" name="Taxa_Juros"
                                id="Taxa_Juros" required maxlength="3" min="3" onblur="taxa_Juros()"
                                value="{{ isset($boleto_titulo->Taxa_Juros) ? $boleto_titulo->Taxa_Juros : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Acrescimo">Valor do Acrescimo:</b>
                            <input type="text" class="form-control input-border-bottom" name="Acrescimo" id="Acrescimo"
                                required maxlength="10" min="3" onblur="acrescimo()"
                                value="{{ isset($boleto_titulo->Acrescimo) ? $boleto_titulo->Acrescimo : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Desconto">Valor do Desconto:</b>
                            <input type="text" class="form-control input-border-bottom" name="Desconto" id="Desconto"
                                required maxlength="10" min="3" onblur="desconto()"
                                value="{{ isset($boleto_titulo->Desconto) ? $boleto_titulo->Desconto : '' }}">
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
                            <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor">
                                <option value="0">Selecione</option>
                                @foreach($clifor as $clifor)
                                @can('view_clifor', $clifor)
                                    <option value="{{ $clifor->Codigo }}"
                                        {{ $boleto_titulo->Cod_CliFor == $clifor->Codigo ? "selected" : "" }}>
                                        {{ $clifor->Nome_Fantasia }}</option>
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_NF">Nota Fical:</b>
                            <select class="form-control input-border-bottom" id="Cod_NF" name="Cod_NF">
                                <option value="0">Selecione</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_CtaRec">Código Contas a Receber:</b>
                            <select class="form-control input-border-bottom" id="Cod_CtaRec" name="Cod_CtaRec">
                            @foreach($ctas_receber as $c)
                                    @can('view_ctas_receber', $c)
                                    <option value="{{ $c->Codigo }}" {{ $boleto_titulo->Cod_CtaRec == $c->Codigo ? "selected" : "" }}>
                                    {{ $c->Num_Doc }}</option>
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data_Bai">Data de Baixa</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Bai" id="Data_Bai"
                                required
                                value="{{$boleto_titulo->Data_Bai}}">
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
                            <b class="ls-label-text" for="Data_Liq">Data de Liquidação</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Liq" id="Data_Liq"
                                required
                                value="{{$boleto_titulo->Data_Liq}}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Situacao">Situação do Título</b>
                            <select class="form-control input-border-bottom" id="Situacao" name="Situacao">
                                <option
                                    value="{{ isset($boleto_titulo->Situacao) ? $boleto_titulo->Situacao : '' }} ">
                                    @if( $boleto_titulo->Situacao =="C" )
                                        <label>Carteira</label><br>
                                    @elseif( $boleto_titulo->Situacao =="B" )
                                        <label>Baixado</label><br>
                                        @elseif( $boleto_titulo->Situacao =="L" )
                                        <label>Liquidado</label><br>
                                    @else
                                        <label>Vencido</label><br>
                                    @endif
                                </option>
                                <option value="C">Carteira</option>
                                <option value="B">Baixado</option>
                                <option value="L">Liquidado</option>
                                <option value="V">Vencido</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cod_Rem">Num da Remessa:</b>
                            <select class="form-control input-border-bottom" id="Cod_Rem" name="Cod_Rem">
                                <option value="0">Selecione</option>
                                @foreach($boleto_remessa as $boleto_remessa)
                                    @can('view_boletoRem', $boleto_remessa)
                                     <option value="{{ $boleto_remessa->Codigo }}" 
                                        {{ $boleto_titulo->Cod_Rem == $boleto_remessa->Codigo ? "selected" : "" }}>
                                        {{ $boleto_remessa->Numero_Rem }}</option>
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Transacao">Num da Transação:</b>
                            <input type="text" class="form-control input-border-bottom" name="Transacao" id="Transacao"
                                required maxlength="10" min="1"
                                value="{{ isset($boleto_titulo->Transacao) ? $boleto_titulo->Transacao : '' }}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Empresa">Empresa:</b>
                            <select class="form-control input-border-bottom" id="Empresa" name="Empresa" readonly 
                            disabled>
                                <option value="0">Sem empresa</option>
                                @foreach($empresa as $empresa)
                                @can('view_empresa_boleto', $empresa)
                                    <option value="{{ $empresa->Codigo }}"
                                        {{ $boleto_titulo->Empresa == $empresa->Codigo ? "selected" : "" }}>
                                        {{ $empresa->Razao_Social }}</option>
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
                        <a href="{{ url("/Cadastro/boleto_titulo") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>
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

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }
    function multa() {
        var desc = parseFloat(document.getElementById('Multa').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Multa').value = lim;
    }
    function taxa_Juros() {
        var desc = parseFloat(document.getElementById('Taxa_Juros').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Taxa_Juros').value = lim;
    }
    function acrescimo() {
        var desc = parseFloat(document.getElementById('Acrescimo').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Acrescimo').value = lim;
    }
    function desconto() {
        var desc = parseFloat(document.getElementById('Desconto').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Desconto').value = lim;
    }
</script>
