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
<a href="{{ url("/Cadastro/inventario_cont")  }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Contagem de Inventario
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                            <form method="post" action="{{ url("/InventarioContagem/salvar/$id") }}"
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
            </div> <div class="form-group col-lg-12" hidden>
                            <b class="ls-label-text" for="Responsavel">Responsável:</b>
                            <input type="text" class="form-control input-border-bottom" name="Responsavel" id="Responsavel"
                                readonly value="{{ Auth::user()->id }}">
            </div>
          </div>
          <div class=" form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Codigo_Barras">Agrupado de Codigo de barras:</b>
                                <input type="text" class="form-control input-border-bottom" name="Codigo_Barras"
                                    id="Codigo_Barras" maxlength="13" required value="{{ isset($inventario_contagem->Codigo_Barras) ? $inventario_contagem->Codigo_Barras : '' }} ">
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
                        <a href="{{ url("/Cadastro/inventario_cont")  }}"  class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
