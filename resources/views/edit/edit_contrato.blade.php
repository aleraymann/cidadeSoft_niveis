@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/contrato") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Contrato
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Contrato/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Contrato/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom"
                                name="Cod_CliFor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                   @can('view_clifor', $clifor)
                                   <option value="{{ $clifor->Codigo }}" {{ $contrato->Cod_CliFor == $clifor->Codigo ? "selected" : "" }}>
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
                            <b class="ls-label-text" for="Dia_Venc">Dia do Venc das Parcelas:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dia_Venc" id="Dia_Venc" minlength="1" 
                            maxlength="5" value="{{ isset($contrato->Dia_Venc) ? $contrato->Dia_Venc : '' }} " required onblur="comissao()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Parceria">Parceria:</b>
                            <select class="form-control input-border-bottom" name="Parceria" id="Parceria" required onchange="verifica(this.value)">
                            <option value="{{ isset($contrato->Parceria) ? $contrato->Parceria : '' }} ">
                            {{ $contrato->Parceria == '0'? 'Não': 'Sim' }}
                            </option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Parceiro">Parceiro:</b>
                            <input type="text" class="form-control input-border-bottom" name="Parceiro" id="Parceiro" minlength="3" 
                            maxlength="60" disabled placeholder="Parceiro não necessário" 
                            value="{{ isset($contrato->Parceiro) ? $contrato->Parceiro: '' }} ">
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
                            <b class="ls-label-text" for="Perc_Comissao">Comissão:</b>
                            <input type="text" class="form-control input-border-bottom" name="Perc_Comissao" id="Perc_Comissao" minlength="3" 
                            maxlength="3" value="{{ isset($contrato->Perc_Comissao) ? $contrato->Perc_Comissao : '' }} " required onblur="perc_Comissao()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data">Data do Contrato:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data" id="Data "required  value="{{$contrato->Data}}">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Tipo_Cob">Tipo de Cobrança:</b>
                            <select class="form-control input-border-bottom" name="Tipo_Cob" id="Tipo_Cob" required>
                            <option value="{{ isset($contrato->Tipo_Cob) ? $contrato->Tipo_Cob : '' }} ">
                            {{ $contrato->Tipo_Cob}}
                            </option>
                                <option value="Boleto">Boleto</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Depósito">Depósito</option>
                                <option value="Dinheiro">Dinheiro</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Convenio">Convenio:</b>
                            <select class="form-control input-border-bottom"
                                name="Convenio" required>
                                <option value="">Selecione</option>
                                @foreach($convenio as $convenio)
                                   @can('view_convenio', $convenio)
                                   <option value="{{ $convenio->Codigo }}" {{ $contrato->Convenio == $convenio->Codigo ? "selected" : "" }}>
                                   {{ $convenio->Convenio }}</option>  
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
                            <b class="ls-label-text" for="Valor">Valor da Mensalidade:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" minlength="3" 
                            maxlength="10" value="{{$contrato->Valor}}" required onblur="valor()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        </div> 
                        <div class="form-row">  
                        <div class="form-group col-lg-6">
                         <label for="Observacoes">Observções Gerais:</label>
                         <textarea type="text" class="form-control input-border-bottom " name="Observacoes"
                            id="Observacoes"
                            value="">{{ $contrato->Observacoes }}</textarea>
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
                        <a href="{{ url("/Cadastro/contrato") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
     function verifica(value) {
         var parceria = document.getElementById("Parceria");
         var parceiro = document.getElementById("Parceiro");
         if (value == "0") {
            parceiro.disabled = true;
            parceiro.placeholder = "Parceiro não necessário";
            parceiro.required= false;
         } else if (value == "1") {
            parceiro.disabled = false;
            parceiro.placeholder = "Digite o seu Parceiro";
            parceiro.required= true;
         }
     };
     function perc_Comissao() {
        var desc = parseFloat(document.getElementById('Perc_Comissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Perc_Comissao').value = lim;
    }

    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }
 </script>