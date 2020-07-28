@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/fidelidade")  }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de CFOP
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                            <form method="post" action="{{ url("/CFOP/salvar/$id") }}"
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
                            <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="CFOP">Num da CFOP:</b>
                                <input type="text" class="form-control input-border-bottom" name="CFOP" id="CFOP"
                                    maxlength="10" required value="{{ isset($cfop->CFOP) ? $cfop->CFOP : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="ES">Entrada / Saída:</b>
                                <select class="form-control input-border-bottom" name="ES" id="ES" required>
                                <option value="{{isset($cfop->ES) ? $cfop->ES : '' }} ">{{ $cfop->ES == "S"? "Saída": "Entrada"}}</option>
                                    <option value="S">Saída</option>
                                    <option value="E">Entrada</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>

                            <div class="form-group col-lg-3 ml-2">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="AlimFin" name="AlimFin"
                                            value="1"  <?php if($cfop->AlimFin == '1'){ echo "checked"; } ?>>Alimentar Fianceiro Automaticamente?
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="AlimFisc" name="AlimFisc"
                                            value="1"  <?php if($cfop->AlimFisc == '1'){ echo "checked"; } ?>>Alimentar Movimento Fiscal Automaticamente?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Descricao">Descrição:</b>
                                <input type="text" class="form-control input-border-bottom" name="Descricao"
                                    id="Descricao" maxlength="400" required value="{{ isset($cfop->Descricao) ? $cfop->Descricao : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Aplicacao">Aplicação:</b>
                                <input type="text" class="form-control input-border-bottom" name="Aplicacao"
                                    id="Aplicacao" maxlength="400" required value="{{ isset($cfop->Aplicacao) ? $cfop->Aplicacao : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="Dispositivo">Dispositivo:</b>
                                <input type="text" class="form-control input-border-bottom" name="Dispositivo"
                                    id="Dispositivo" maxlength="200" required value="{{ isset($cfop->Dispositivo) ? $cfop->Dispositivo : '' }} ">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="ObsnaNFe">Observação a adicionar na NFe:</b>
                                <input type="text" class="form-control input-border-bottom" name="ObsnaNFe"
                                    id="ObsnaNFe" maxlength="200" required value="{{ isset($cfop->ObsnaNFe) ? $cfop->ObsnaNFe : '' }} ">
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
                   $('input').on("keypress", function(e) {
                        /* ENTER PRESSED*/
                        if (e.keyCode == 13) {
                            /* FOCUS ELEMENT */
                            var inputs = $(this).parents("form").eq(0).find(":input");
                            var idx = inputs.index(this);
                
                            if (idx == inputs.length - 1) {
                                inputs[0].select()
                            } else {
                                inputs[idx + 1].focus(); //  handles submit buttons
                                inputs[idx + 1].select();
                            }
                            return false;
                        }
                    });
                      </script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('input').on("keypress", function(e) {
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
                        <a href="{{ url("/Cadastro/cfop")  }}"  class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
