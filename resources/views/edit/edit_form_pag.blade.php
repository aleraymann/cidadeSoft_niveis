@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Comi_Operad").mask("9.99");
        $("#Tx_Antecip").mask("9.99");
    });

</script>


<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/form_pag") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Forma de Pagamento
                </h4>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Forma/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Forma/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Descricao	">Descrição:</b>
                            <input type="text" class="form-control  input-border-bottom" name="Descricao" id="Descricao"
                                placeholder="" required minlength="2" maxlength="45"
                                value="{{ isset($form_pag->Descricao) ? $form_pag->Descricao : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Comi_Operad">Comissão a ser paga:</b>
                            <input type="text" class="form-control input-border-bottom" name="Comi_Operad"
                                id="Comi_Operad" minlength="3" required
                                value="{{ isset($form_pag->Comi_Operad) ? $form_pag->Comi_Operad : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Tx_Antecip">Tava de antecip. de Crédito:</b>
                            <input type="text" class="form-control input-border-bottom" name="Tx_Antecip"
                                id="Tx_Antecip" minlength="3" required
                                value="{{ isset($form_pag->Tx_Antecip) ? $form_pag->Tx_Antecip : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tipo">Código:</b>
                            <select class="form-control input-border-bottom" id="Tipo" name="Tipo">
                                <option
                                    value="{{ isset($form_pag->Tipo) ? $form_pag->Tipo : '' }} ">
                                    @if( $form_pag->Tipo=="DI")
                                        Dinheiro
                                    @elseif( $form_pag->Tipo =="CH")
                                        Cheque
                                    @elseif( $form_pag->Tipo =="CC")
                                        Cartão de Crédito
                                    @elseif( $form_pag->Tipo =="CD")
                                        Cartão de Débito
                                    @elseif( $form_pag->Tipo =="BO")
                                        Boleto
                                    @else
                                        Duplicata Mercantil
                                    @endif
                                </option>
                                <option value="DI">Dinheiro</option>
                                <option value="CH">Cheque</option>
                                <option value="CC">Cartão de Crédito</option>
                                <option value="CD">Cartào de Débito</option>
                                <option value="BO">Boleto</option>
                                <option value="DM">Duplicata Mercantil</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Dest_CliFor">Cli/For de Destino:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dest_CliFor"
                                id="Dest_CliFor" minlength="3"
                                value="{{ isset($form_pag->Dest_CliFor) ? $form_pag->Dest_CliFor : '' }} ">
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
                            <b class="ls-label-text" for="Destino">Destino do Pagamento:</b>
                            <select class="form-control input-border-bottom" id="Destino" name="Destino">
                                <option
                                    value="{{ isset($form_pag->Destino) ? $form_pag->Destino : '' }} ">
                                    @if( $form_pag->Destino=="BC")
                                        {{ $form_pag->Destino = "Banco" }}
                                    @elseif( $form_pag->Destino =="CX")
                                        {{ $form_pag->Destino = "Caixa" }}
                                    @else
                                        {{ $form_pag->Destino= "Contas" }}
                                    @endif
                                </option>
                                <option value="CX">Caixa</option>
                                <option value="BC">Banco</option>
                                <option value="CT">Contas</option>
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
                        <a href="{{ url("/Cadastro/form_pag") }}" class="btn btn-danger ml-3">Cancelar</a>
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
