@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Valor").mask("99999999.99");
        $("#Transacao").mask("99999999999");
    });

</script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/recibo") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Recibos
                </h4>
            </div>
            <div class="card-body">

                <!-- Modal body -->
                <div class="modal-body">
                            <form method="post" action="{{ url("/Recibo/salvar/$id") }}"
                                enctype="multipart/form-data">
                                <div class="form-row">
                        <div class="form-group col-lg-12" hidden>
                            <b class="ls-label-text" for="user_id">User_ID:</b>
                            <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
                                readonly value="
@if(Auth::user()->hasAnyRoles('adm') || Auth::user()->hasAnyRoles('s_adm'))
                            {{ Auth::user()->id }}
@else
                            {{ Auth::user()->adm }}
@endif" >
            </div>
          </div>
                <div class=" form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Pag_Rec">Pago/Recebido:</b>
                                <select class="form-control input-border-bottom" name="Pag_Rec" required>
                                <option value="{{ isset($recibo->Pag_Rec) ? $recibo->Pag_Rec : '' }} ">
                            {{ $recibo->Pag_Rec == 'P'? 'Pago': 'Recebido' }}
                            </option>
                                    <option value="P">Pago</option>
                                    <option value="R">Recebido</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Rec_De">Recebido de:</b>
                                <select class="form-control input-border-bottom" name="Rec_De" id="Rec_De">
                                    <option value="">Selecione</option>
                                    @foreach($clifor as $clifor)
                                        @can('view_clifor', $clifor)
                                        <option value="{{ $clifor->Codigo }}" {{ $recibo->Rec_De == $clifor->Codigo ? "selected" : "" }}>
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
                                <b class="ls-label-text" for="Pag_Para">Pago Para:</b>
                                <select class="form-control input-border-bottom" name="Pag_Para" id="Pag_Para">
                                    <option value="">Selecione</option>
                                    @foreach($clifor1 as $clifor)
                                        @can('view_clifor', $clifor)
                                        <option value="{{ $clifor->Codigo }}" {{ $recibo->Pag_Para == $clifor->Codigo ? "selected" : "" }}>
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
                                <b class="ls-label-text" for="Valor">Valor:</b>
                                <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor"
                                    minlength="3" maxlength="10" required onblur="valor()" required
                                    value="{{ isset($recibo->Valor) ? $recibo->Valor : '' }} ">
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
                                <b class="ls-label-text" for="Data">Data:</b>
                                <input type="date" class="form-control input-border-bottom" name="Data" id="Data"
                                    maxlength="10" required  value="{{$recibo->Data}}">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-9">
                                <b class="ls-label-text" for="Referente">Referente a:</b>
                                <input type="text" class="form-control input-border-bottom" name="Referente"
                                    id="Referente" minlength="3" maxlength="100" required  value="{{ isset($recibo->Referente) ? $recibo->Referente : '' }} ">
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
                                <b class="ls-label-text" for="Ben_Nome">Nome do Beneficiário:</b>
                                <input type="text" class="form-control input-border-bottom" name="Ben_Nome"
                                    id="Ben_Nome" minlength="3" maxlength="45" value="{{ isset($recibo->Ben_Nome) ? $recibo->Ben_Nome : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Ben_End">Endereço do Beneficiário:</b>
                                <input type="text" class="form-control input-border-bottom" name="Ben_End" id="Ben_End"
                                    minlength="3" maxlength="45" value="{{ isset($recibo->Ben_End) ? $recibo->Ben_End : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Doc">Documento:</b>
                                <select onchange="verifica(this.value)" class="form-control input-border-bottom"
                                    id="Doc" name="Doc">
                                    <option value="{{ isset($recibo->Doc) ? $recibo->Doc : '' }} ">
                            {{ $recibo->Doc == '1'? 'CPF': 'CNPJ' }}</option>
                                    <option value="1">CPF</option>
                                    <option value="2">CNPJ</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3" id="CPF" hidden>
                                <b class="ls-label-text" for="Ben_CPF_CNPJ">CPF do Beneficiario:</b>
                                <input type="text" class="form-control input-border-bottom" name="Ben_CPF_CNPJ"
                                    id="iCPF" minlength="3" maxlength="11" onblur="validarCPF(this)" value="{{ isset($recibo->Ben_CPF_CNPJ) ? $recibo->Ben_CPF_CNPJ : '' }} ">

                            </div>

                            <div class="form-group col-lg-3" id="CNPJ" hidden >
                                <b class="ls-label-text" for="Ben_CPF_CNPJ">CNPJ do Beneficiario:</b>
                                <input type="text" class="form-control input-border-bottom" name="Ben_CPF_CNPJ"
                                    id="iCNPJ" minlength="3" maxlength="14" onblur="validarCNPJ(this)" value="{{ isset($recibo->Ben_CPF_CNPJ) ? $recibo->Ben_CPF_CNPJ : '' }} ">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Em_Nome">Nome do Emitente:</b>
                                <input type="text" class="form-control input-border-bottom" name="Em_Nome" id="Em_Nome"
                                    minlength="3" maxlength="45"  value="{{ isset($recibo->Em_Nome) ? $recibo->Em_Nome : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Em_End">Endereço do Emitente:</b>
                                <input type="text" class="form-control input-border-bottom" name="Em_End" id="Em_End"
                                    minlength="3" maxlength="45"  value="{{ isset($recibo->Em_End) ? $recibo->Em_End : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="Doc2">Documento:</b>
                                <select onchange="verifica2(this.value)" class="form-control input-border-bottom"
                                    id="Doc2" name="Doc2">
                                    <option value="{{ isset($recibo->Doc2) ? $recibo->Doc2 : '' }} ">
                            {{ $recibo->Doc2 == '1'? 'CPF': 'CNPJ' }}</option>
                                    <option value="1">CPF</option>
                                    <option value="2">CNPJ</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3" id="CPF2" hidden>
                            
                                <b class="ls-label-text" for="Em_CPF_CNPJ">CPF do Emitente:</b>
                                <input type="text" class="form-control input-border-bottom" name="Em_CPF_CNPJ"
                                    id="iCPF2" minlength="3" maxlength="11" onblur="validarCPF(this)" value="{{ isset($recibo->Em_CPF_CNPJ) ? $recibo->Em_CPF_CNPJ : '' }} " >
                            </div>
                            

                            <div class="form-group col-lg-3" id="CNPJ2" hidden>
                                <b class="ls-label-text" for="Em_CPF_CNPJ">CNPJ do Emitente:</b>
                                <input type="text" class="form-control input-border-bottom" name="Em_CPF_CNPJ"
                                    id="iCNPJ2" minlength="3" maxlength="14" onblur="validarCNPJ(this)"  value="{{ isset($recibo->Em_CPF_CNPJ) ? $recibo->Em_CPF_CNPJ : '' }} " >
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-2">
                                <label for="Transacao">Transação:</label>
                                <input type="text" class="form-control input-border-bottom" name="Transacao"
                                    id="Transacao" minlength="3" maxlength="11"  value="{{ isset($recibo->Transacao) ? $recibo->Transacao : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="Empresa">Empresa:</label>
                                <select class="form-control input-border-bottom" id="Empresa" name="Empresa">
                                    <option value="0">Selecione</option>

                                    @foreach($empresa as $empresa)
                                        @can("view_empresa",$empresa)
                                        <option value="{{ $empresa->Codigo }}"
                                        {{ $recibo->Empresa == $empresa->Codigo ? "selected" : "" }}>
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
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/recibo") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script type="text/javascript">
    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }

</script>
<script>
    function verifica(value) {
        var cnpj = document.getElementById("CNPJ");
        var icnpj = document.getElementById("iCNPJ");
        var cpf = document.getElementById("CPF");
        var icpf = document.getElementById("iCPF");
        if (value == "1") {
            cpf.hidden = false;
            cnpj.hidden = true;
            icnpj.disabled = true
            icpf.disabled = false
        } else if (value == "2") {
            cpf.hidden = true;
            cnpj.hidden = false;
            icpf.disabled = true;
            icnpj.disabled = false
        }
    };
    

    function verifica2(value) {
        var cnpj = document.getElementById("CNPJ2");
        var icnpj = document.getElementById("iCNPJ2");
        var cpf = document.getElementById("CPF2");
        var icpf = document.getElementById("iCPF2");
        if (value == "1") {
            cpf.hidden = false;
            cnpj.hidden = true;
            icnpj.disabled = true
            icpf.disabled = false
        } else if (value == "2") {
            cpf.hidden = true;
            cnpj.hidden = false;
            icpf.disabled = true;
            icnpj.disabled = false
        }
    };

</script>
<script type="text/javascript">
    function _cnpj(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '') return false;

        if (cnpj.length != 14)
            return false;


        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;


        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;

    }

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

    function validarCNPJ(el) {
        if (!_cnpj(el.value)) {

            alert("CNPJ inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {

        }
    }

    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("cpf inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
           
        }
    }

</script>