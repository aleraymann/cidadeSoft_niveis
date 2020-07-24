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
                    Edição de Condição de Pagamento
                </h4>
            </div>
            <div class="card-body">
              <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Condicao/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Condicao/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Condicao	">Condição</b>
                            <input type="text" class="form-control input-border-bottom" name="Condicao" id="Condicao"
                                placeholder="1x, 30/60, 15 D.D." required minlength="2" maxlength="45"
                                value="{{ isset($cond_pag->Condicao) ? $cond_pag->Condicao : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tab_Preco">Tabela de Preço:</b>
                            <select class="form-control input-border-bottom" id="Tab_Preco" name="Tab_Preco">
                                <option
                                    value="{{ isset($cond_pag->Tab_Preco) ? $cond_pag->Tab_Preco : '' }} ">
                                    {{ $cond_pag->Tab_Preco }}</option>
                                <option value="À Prazo">À Prazo</option>
                                <option value="À Vista">À Vista</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="ParcDias">Dias entre parcelas:</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcDias" id="ParcDias"
                                required
                                value="{{ isset($cond_pag->ParcDias) ? $cond_pag->ParcDias : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="ParcForma">Forma de Pag no Recebimento</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcForma" id="ParcForma" required
                            value="{{ isset($cond_pag->ParcForma) ? $cond_pag->ParcForma : '' }} ">
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="ParcJuros">Juro a ser aplicado:</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcJuros" id="ParcJuros"
                                minlength="3" onblur="parcJuros()"
                                value="{{ isset($cond_pag->ParcJuros) ? $cond_pag->ParcJuros : '' }} ">
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
                        <a href="{{ url("/Cadastro/cond_pag") }}" class="btn btn-danger ml-3">Cancelar</a>
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
 
 function parcJuros() {
        var desc = parseFloat(document.getElementById('ParcJuros').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ParcJuros').value = lim;
    }
</script>