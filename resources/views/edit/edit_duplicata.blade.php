@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Fatura").mask("9999999999");
        $("#Transacao").mask("9999999999");
        $("#Valor").mask("99999999.99");
    });

</script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/duplicata")  }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Duplicata
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                            <form method="post" action="{{ url("/Duplicata/salvar/$id") }}"
                                enctype="multipart/form-data">
                                <div class=" form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cod_NF">NF:</b>
                            <select class="form-control input-border-bottom" name="Cod_NF" id="Cod_NF" required>
                                <option value="0">Selecione</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Fatura">Num da Fatura:</b>
                            <input type="text" class="form-control input-border-bottom" name="Fatura" id="Fatura"
                                maxlength="10" required  value="{{ isset($duplicata->Fatura) ? $duplicata->Fatura : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Valor">Valor:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor"
                                maxlength="10" required onblur="valor()" value="{{ isset($duplicata->Valor) ? $duplicata->Valor : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Vencimento">Vencimento:</b>
                            <input type="date" class="form-control input-border-bottom" name="Vencimento" id="Vencimento"
                                maxlength="10" required value="{{$duplicata->Vencimento}}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" name="Cod_CliFor" id="Cod_CliFor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                    @can('view_clifor', $clifor)
                                    <option value="{{ $clifor->Codigo }}" {{ $duplicata->Cod_CliFor == $clifor->Codigo ? "selected" : "" }}>
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
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Boleto">Boleto:</b>
                            <select class="form-control input-border-bottom" name="Cod_Boleto" id="Cod_Boleto" required>
                                <option value="">Selecione</option>
                                @foreach($boleto as $boleto)
                                    @can('view_boletoTit', $boleto)
                                    <option value="{{ $boleto->Codigo }}" {{ $duplicata->Cod_Boleto == $boleto->Codigo ? "selected" : "" }}>
                                    Num: {{ $boleto->Nosso_Num }} / R$: {{ $boleto->Valor }}</option>
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
                            <b class="ls-label-text" for="Empresa">Empresa:</b>
                            <select class="form-control input-border-bottom" name="Empresa" id="Empresa" required>
                                <option value="">Selecione</option>
                                @foreach($empresa as $empresa)
                                    @can('view_empresa', $empresa)
                                    <option value="{{ $empresa->Codigo }}" {{ $duplicata->Empresa == $empresa->Codigo ? "selected" : "" }}>
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
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Transacao">Transação:</b>
                            <input type="text" class="form-control input-border-bottom" name="Transacao" id="Transacao"
                                maxlength="10" required value="{{ isset($duplicata->Transacao) ? $duplicata->Transacao : '' }} ">
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
                        function comissao() {
                        var desc = parseFloat(document.getElementById('Cotacao').value, 2);
                        lim = desc.toFixed(2);
                        document.getElementById('Cotacao').value = lim;
                        }

                    </script>
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/duplicata")  }}"  class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
