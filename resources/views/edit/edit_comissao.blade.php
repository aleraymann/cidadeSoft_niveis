@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#ParcJuros").mask("9.99");
    });

</script>



<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/cond_pag") }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Comissão
                </h4>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form method="post" action="{{ url("Comissao/salvar/$id") }}"
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
                                    <b class="ls-label-text" for="OS_Ped">Pedido / OS:</b>
                                    <select class="form-control input-border-bottom" id="OS_Ped" name="OS_Ped">
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
                                    <b class="ls-label-text" for="Cod_Venda">Venda:</b>
                                    <select class="form-control input-border-bottom" id="Cod_Venda" name="Cod_Venda">
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
                                    <b class="ls-label-text" for="Cod_Fun">Funcionário:</b>
                                    <select class="form-control input-border-bottom" id="Cod_Fun" name="Cod_Fun"
                                        required>
                                        <option value="0">Selecione</option>
                                        @foreach($funcionario as $u)
                                        @can('update_funcionario',$u)
                                          <option value="{{ $u->Codigo }}"
                                        {{ $comissao->Cod_Fun == $u->Codigo ? "selected" : "" }}>
                                        {{ $u->Nome }}</option>
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
                                    <b class="ls-label-text" for="Valor">Valor da Venda:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor"
                                        onblur="valor()" minlength="3" maxlength="3"  value="{{ isset($comissao->Valor) ? $comissao->Valor : '' }} ">
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
                                    <b class="ls-label-text" for="Cod_Item">Cod do Item:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Cod_Item"
                                        id="Cod_Item" required value="{{ isset($comissao->Cod_Item) ? $comissao->Cod_Item : '' }} ">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Transacao">Transação:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Transacao"
                                        id="Transacao" required value="{{ isset($comissao->Transacao) ? $comissao->Transacao : '' }} ">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Comissao">Comissão:</b>
                                    <input type="text" class="form-control input-border-bottom" name="Comissao"
                                        id="Comissao" onblur="comissao()" minlength="3" value="{{ isset($comissao->Comissao) ? $comissao->Comissao : '' }} ">
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Data_Prev">Previsão para Pagamento:</b>
                                    <input type="date" class="form-control input-border-bottom" name="Data_Prev"
                                        id="Data_Prev" required value="{{$comissao->Data_Prev}}">
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
                                    <b class="ls-label-text" for="Situacao">Situação:</b>
                                    <select class="form-control input-border-bottom" id="Situacao" name="Situacao"
                                        required>
                                        <option
                                    value="{{ isset($comissao->Situacao) ? $comissao->Situacao : '' }} ">
                                    {{ $comissao->Situacao=="L"?"Livre":"Bloqueado" }}</option>
                                        <option value="L">Livre</option>
                                        <option value="B">Bloqueado</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Status">Status:</b>
                                    <select class="form-control input-border-bottom" id="Status" name="Status" required>
                                    <option
                                    value="{{ isset($comissao->Status) ? $comissao->Status : '' }} ">
                                    {{ $comissao->Status=="A"?"Aberto":"Pago" }}</option>
                                        <option value="A">Aberto</option>
                                        <option value="P">Pago</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, Campo Obrigatório!
                                    </div>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>
                                </div>

                                <div class="form-group col-lg-3">
                                    <b class="ls-label-text" for="Cod_Conta">Contas a Receber:</b>
                                    <select class="form-control input-border-bottom" id="Cod_Conta" name="Cod_Conta"
                                        required>
                                        <option value="">Selecione</option>
                                        @foreach($contas_receber as $u)
                                        <option value="{{ $u->Codigo }}"
                                        {{ $comissao->Cod_Conta == $u->Codigo ? "selected" : "" }}>
                                        {{ $u->Num_Doc }}</option>
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
                                <a href="{{ url("/Cadastro/comissao") }}"
                                    class="btn btn-danger ml-3">Cancelar</a>
                    </form>
                </div>
            </div>
            <div>
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
    </div>
    @endsection
    <script type="text/javascript">
        function valor() {
            var desc = parseFloat(document.getElementById('Valor').value, 2);
            lim = desc.toFixed(2);
            document.getElementById('Valor').value = lim;
        }

        function comissao() {
            var desc = parseFloat(document.getElementById('Comissao').value, 2);
            lim = desc.toFixed(2);
            document.getElementById('Comissao').value = lim;
        }

    </script>
