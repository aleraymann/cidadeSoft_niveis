@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url(url()->previous()) }}" class="btn btn-primary ml-3 mb-1">
        <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Ajuste de Item
                </h4>
            </div>
            <div class="card-body">


                <div class="modal-body">
                    <form method="post" action="{{ url("/AjusteItem/salvar/$id") }}"
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
                                <b class="ls-label-text" for="Cod_Ajuste">Cod Ajuste:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Ajuste"
                                    id="Cod_Ajuste" required value="{{ $ajuste_item->Cod_Ajuste }}" readonly>
                                <div class="invalid-feedback">
                                    Por favor, Mínimo 2 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Cod_Ref">Codigo de Referência:</b>
                                <input type="text" class="form-control input-border-bottom" name="Cod_Ref" id="Cod_Ref"
                                    maxlength="25" minlength="3" required value="{{ $ajuste_item->Cod_Ref }}">
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
                                <b class="ls-label-text" for="Qtd">Quantidade de ajuste:</b>
                                <input type="text" class="form-control input-border-bottom" name="Qtd" id="Qtd"
                                    maxlength="10" minlength="5" required onblur="qtd()" value="{{ $ajuste_item->Qtd }}">
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
                                <b class="ls-label-text" for="Preco">Preço Unitário:</b>
                                <input type="text" class="form-control input-border-bottom" name="Preco" id="Preco"
                                    maxlength="10" minlength="5" required onblur="preco()" value="{{ $ajuste_item->Preco }}">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Total">Valor Total:</b>
                                <input type="text" class="form-control input-border-bottom" name="Total" id="Total"
                                    maxlength="10" minlength="5" required onblur="total()"value="{{ $ajuste_item->Total }}">
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
                                <a href="{{ url(url()->previous()) }}"
                                    class="btn btn-danger ml-3">Cancelar</a>
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
                    function qtd() {
        var desc = parseFloat(document.getElementById('Qtd').value, 2);
        lim = desc.toFixed(4);
        document.getElementById('Qtd').value = lim;
    }

    function preco() {
        var desc = parseFloat(document.getElementById('Preco').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Preco').value = lim;
    }

    function total() {
        var desc = parseFloat(document.getElementById('Total').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Total').value = lim;
    }
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

</script>
