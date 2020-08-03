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
                    Edição de Recibos de Títulos
                </h4>
            </div>
            <div class="card-body">

                <!-- Modal body -->
                <div class="modal-body">
                            <form method="post" action="{{ url("/ReciboTitulo/salvar/$id") }}"
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
                            <div class="form-group col-lg-4">
                                <b class="ls-label-text" for="Cod_Rec">Recibo:</b>
                                <select class="form-control input-border-bottom" name="Cod_Rec" id="Cod_Rec">
                                    @foreach($recibo as $recibo)
                                        @can('view_recibo', $recibo)
                                        <option value="{{ $recibo->Codigo }}" {{ $recibo_tit->Cod_Rec == $recibo->Codigo ? "selected" : "" }}>
                                        R$: {{ $recibo->Valor }} / Data: {{ $recibo->Data }}</option>
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
                                <b class="ls-label-text" for="Cod_Tit">Título:</b>
                                <select class="form-control input-border-bottom" name="Cod_Tit" id="Cod_Tit">
                                    <option value="">Selecione</option>
                                    @foreach($titulo as $titulo)
                                        @can('view_boletoTit', $titulo)
                                        <option value="{{ $titulo->Codigo }}" {{ $recibo_tit->Cod_Tit ==$titulo->Codigo ? "selected" : "" }}>
                                        R$: {{ $titulo->Valor }} / Num do Doc: {{ $titulo->Nro_Doc }}</option>  
                                            
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
                        <a href="{{ url("/Cadastro/recibo_titulo") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
