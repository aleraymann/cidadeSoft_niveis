@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Parcela").mask("99/99");
        $("#Valor_Origem").mask("99999999.99");
        $("#Valor_Pago").mask("99999999.99");
        $("#Valor_Divida").mask("99999999.99");
        $("#Multa").mask("99999999.99");
        $("#Desconto").mask("99999999.99");
        $("#Juros").mask("99999999.99");
        $("#Num_DocCxBco").mask("99999999999");
    });

</script>
<div class="main-panel" style="margin-top:60px">
    <a  href="{{ url("/Cadastro/ctas_recebidas")}}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Contas Recebidas
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Contas_Recebidas/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Contas_Recebidas/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class=" form-row">
                <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                            <select class="form-control input-border-bottom" name="Cod_Conta" id="Cod_Conta" required>
                                <option value="">Selecione</option>
                                @foreach($conta as $conta)
                                    @can('view_conta', $conta)
                                    <option value="{{$conta->Codigo }}" {{ $ctas_recebidas->Cod_Conta == $conta->Codigo ? "selected" : "" }}>
                                    Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} / CC:{{ $conta->CC }}-{{$conta->Digito}}</option>
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
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Num_Doc">Número do Documento:</b>
                            <input type="text" class="form-control input-border-bottom" name="Num_Doc" id="Num_Doc"
                                maxlength="15" minlength="1"  value="{{ isset($ctas_recebidas->Num_Doc) ? $ctas_recebidas->Num_Doc : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Parcela">Parcela:</b>
                            <input type="text" class="form-control input-border-bottom" name="Parcela" id="Parcela"
                                maxlength="5" minlength="5"  value="{{ isset($ctas_recebidas->Parcela) ? $ctas_recebidas->Parcela : '' }} " >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Clifor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom" name="Cod_Clifor" id="Cod_Clifor" >
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                    @can('view_clifor', $clifor)
                                    <option value="{{ $clifor->Codigo }}" {{ $ctas_recebidas->Cod_Clifor == $clifor->Codigo ? "selected" : "" }}>
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
                            <b class="ls-label-text" for="Forma_Pag">Forma de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Forma_Pag" id="Forma_Pag" >
                                <option value="">Selecione</option>
                                @foreach($f_pag as $f)
                                    @can('view_formPag', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_recebidas->Forma_Pag == $f->Codigo ? "selected" : "" }}>
                                    {{  $f->Descricao }}</option>
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
                            <b class="ls-label-text" for="Cond_Pag">Cond. de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Cond_Pag" id="Cond_Pag" >
                                <option value="">Selecione</option>
                                @foreach($c_pag as $f)
                                    @can('view_condPag', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_recebidas->Cond_Pag == $f->Codigo ? "selected" : "" }}>
                                    {{  $f->Condicao }}</option>
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
                            <b class="ls-label-text" for="Data_Pagto">Data de Pagamento:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Pagto"
                                id="Data_Pagto" required minlength="" maxlength="10"  value="{{ $ctas_recebidas->Data_Pagto }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data_Baixa">Data de Baixa:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data_Baixa"
                                id="Data_Baixa" required minlength="" maxlength="10" value="{{ $ctas_recebidas->Data_Baixa }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Tipo_Pag">Tipo de Pagamento:</b>
                            <select class="form-control input-border-bottom" name="Tipo_Pag" id="Tipo_Pag" required>
                            <option value="{{ isset($ctas_recebidas->Tipo_Pag) ? $ctas_recebidas->Tipo_Pag : '' }} ">
                            {{ $ctas_recebidas->Tipo_Pag }}
                                <option value="Total">Total</option>
                                <option value="Parcial">Parcial</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Origem">Valor de Origem:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor_Origem" id="Valor_Origem" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_recebidas->Valor_Origem) ? $ctas_recebidas->Valor_Origem : '' }} " onblur="valor_Origem()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Pago">Valor Pago:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor_Pago" id="Valor_Pago" minlength="3" 
                            maxlength="10"value="{{ isset($ctas_recebidas->Valor_Pago) ? $ctas_recebidas->Valor_Pago : '' }} " required onblur="valor_Pago()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Divida">Valor da Dívida:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor_Divida" id="Valor_Divida" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_recebidas->Valor_Divida) ? $ctas_recebidas->Valor_Divida : '' }} "  onblur="valor_Divida()">
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
                        <b class="ls-label-text" for="Multa">(%) de Multa :</b>
                            <input type="text" class="form-control input-border-bottom" name="Multa" id="Multa" minlength="3" 
                            maxlength="10"  value="{{ isset($ctas_recebidas->Multa) ? $ctas_recebidas->Multa : '' }} "  onblur="multa()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Desconto">Desconto:</b>
                            <input type="text" class="form-control input-border-bottom" name="Desconto" id="Desconto" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_recebidas->Desconto) ? $ctas_recebidas->Desconto : '' }} "  onblur="desconto()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Juros">Juros:</b>
                            <input type="text" class="form-control input-border-bottom" name="Juros" id="Juros" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_recebidas->Juros) ? $ctas_recebidas->Juros : '' }} "  onblur="juros()" >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Origem">Local/Nota de Origem:</b>
                            <input type="text" class="form-control input-border-bottom" name="Origem" id="Origem"
                                maxlength="15" minlength="3"  value="{{ isset($ctas_recebidas->Origem) ? $ctas_recebidas->Origem : '' }} ">
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
                            <b class="ls-label-text" for="Local_Pag">Local do Pagamento:</b>
                            <select class="form-control input-border-bottom" required name="Local_Pag" id="Local_Pag" >
                            <option value="{{ isset($ctas_recebidas->Local_Pag) ? $ctas_recebidas->Local_Pag : '' }} ">
                            {{ $ctas_recebidas->Local_Pag == 'BCO'? 'Banco': 'Caixa' }}
                                <option value="BCO">Banco</option>
                                <option value="CX">Caixa</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Num_DocCxBco">Num do Doc Banco/Caixa:</b>
                            <input type="text" class="form-control input-border-bottom" name="Num_DocCxBco" id="Num_DocCxBco"
                                maxlength="11" minlength="3" value="{{ isset($ctas_recebidas->Num_DocCxBco) ? $ctas_recebidas->Num_DocCxBco : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Observacoes">Observações:</b>
                            <input type="text" class="form-control input-border-bottom" name="Observacoes" id="Observacoes"
                                maxlength="80" minlength="3" value="{{ isset($ctas_recebidas->Observacoes) ? $ctas_recebidas->Observacoes : '' }} ">
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
                            <b class="ls-label-text" for="Recibo">Recibo:</b>
                            <select class="form-control input-border-bottom" name="Recibo" id="Recibo" >
                            @foreach($recibos as $c)
                                    @can('view_recibo', $c)
                                    <option value="{{ $c->Codigo }}" {{ $ctas_recebidas->Recibo == $c->Codigo ? "selected" : "" }}>
                                    {{ $c->Valor }}</option>
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
                            <b class="ls-label-text" for="Plano_Ctas">Plano de Contas:</b>
                            <select class="form-control input-border-bottom" name="Plano_Ctas" id="Plano_Ctas" >
                            @foreach($planocontas as $c)
                                    @can('view_planocontas', $c)
                                    <option value="{{ $c->Codigo }}" {{ $ctas_recebidas->Plano_Ctas == $c->Codigo ? "selected" : "" }}>
                                    {{ $c->Conta }}</option>
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
                            <b class="ls-label-text" for="Centro_Custo">Centro de Custo:</b>
                            <select class="form-control input-border-bottom" name="Centro_Custo" id="Centro_Custo" >
                                <option value="">Selecione</option>
                                @foreach($c_cust as $f)
                                    @can('view_centroCusto', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_recebidas->Centro_Custo == $f->Codigo ? "selected" : "" }}>
                                    {{ $f->Descricao }}</option>
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
                            <select class="form-control input-border-bottom" name="Empresa" id="Empresa" >
                                <option value="">Selecione</option>
                                @foreach($empresa as $e)
                                    @can('view_empresa', $e)
                                    <option value="{{ $e->Codigo }}" {{ $ctas_recebidas->Empresa == $e->Codigo ? "selected" : "" }}>
                                    {{ $e->Nome_Fantasia }}</option>
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
                        function valor_Origem() {
                                var desc = parseFloat(document.getElementById('Valor_Origem').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Origem').value = lim;
                            }
                            function valor_Divida() {
                                var desc = parseFloat(document.getElementById('Valor_Divida').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Divida').value = lim;
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
                            function desconto() {
                                var desc = parseFloat(document.getElementById('Desconto').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Desconto').value = lim;
                            }
                            function juros() {
                                var desc = parseFloat(document.getElementById('Juros').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Juros').value = lim;
                            }
                            function divida_Estimada() {
                                var desc = parseFloat(document.getElementById('Divida_Estimada').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Divida_Estimada').value = lim;
                            }

                    </script>
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/ctas_recebidas") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
   