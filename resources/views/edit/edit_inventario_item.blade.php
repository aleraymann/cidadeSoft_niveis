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
    <a href="{{ url()->previous() }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Item de Inventario
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{ url("/InventarioItem/salvar/$id") }}"
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
                                <div class="form-group col-lg-1" hidden>
                                    <b class="ls-label-text" for="Cod_Invent">Cod Invent:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Cod_Invent"
                                        id="Cod_Invent" required value="{{ $inventario_item->Cod_Invent }}" readonly>
                                    <div class="invalid-feedback">
                                        Por favor, Mínimo 2 caracteres!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <b class="ls-label-text" for="Cod_Ref">Codigo de Referência:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Cod_Ref"
                                        id="Cod_Ref" maxlength="25" minlength="3" required  value="{{ $inventario_item->Cod_Ref }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <b class="ls-label-text" for="Cod_Item">Item:</b>
                                    <select class="form-control input-border-bottom" id="Cod_Item" name="Cod_Item">
                                        <option value="0">Selecione</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <b class="ls-label-text" for="Cod_Barras">Codigo de Barras:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Cod_Barras"
                                        id="Cod_Barras" maxlength="13" minlength="3" required  value="{{ $inventario_item->Cod_Barras }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-5">
                                    <b class="ls-label-text" for="Qtd_EstoqueF">Qtd Contábil no Momento da Contagem:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Qtd_EstoqueF"
                                        id="Qtd_EstoqueF" maxlength="10" minlength="5" required onblur="qtd_EstoqueF()" value="{{ $inventario_item->Qtd_EstoqueF }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-5">
                                    <b class="ls-label-text" for="Qtd_EstoqueL">Qtd Livre no Momento da Contagem:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Qtd_EstoqueL"
                                        id="Qtd_EstoqueL" maxlength="10" minlength="5" required onblur="qtd_EstoqueL()"  value="{{ $inventario_item->Qtd_EstoqueL }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-5">
                                    <b class="ls-label-text" for="Qtd_Contagem">Qtd contada no Inventario:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Qtd_Contagem"
                                        id="Qtd_Contagem" maxlength="10" minlength="5" required onblur="qtd_Contagem()"  value="{{ $inventario_item->Qtd_Contagem }}">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-5">
                                    <b class="ls-label-text" for="Divergencia">Total da Divergência na Contagem:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Divergencia"
                                        id="Divergencia" maxlength="10" minlength="5" required onblur="divergencia()"  value="{{ $inventario_item->Divergencia }}">
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

                                function qtd_EstoqueF() {
                                    var desc = parseFloat(document.getElementById('Qtd_EstoqueF').value, 2);
                                    lim = desc.toFixed(4);
                                    document.getElementById('Qtd_EstoqueF').value = lim;
                                }

                                function qtd_EstoqueL() {
                                    var desc = parseFloat(document.getElementById('Qtd_EstoqueL').value, 2);
                                    lim = desc.toFixed(4);
                                    document.getElementById('Qtd_EstoqueL').value = lim;
                                }

                                function qtd_Contagem() {
                                    var desc = parseFloat(document.getElementById('Qtd_Contagem').value, 2);
                                    lim = desc.toFixed(4);
                                    document.getElementById('Qtd_Contagem').value = lim;
                                }

                                function divergencia() {
                                    var desc = parseFloat(document.getElementById('Divergencia').value, 2);
                                    lim = desc.toFixed(4);
                                    document.getElementById('Divergencia').value = lim;
                                }

                            </script>
                            <div class="form-row">

                                {{ csrf_field() }}
                                <button class="btn btn-success">Salvar</button>
                                <a href="{{  url()->previous() }}"
                                    class="btn btn-danger ml-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
