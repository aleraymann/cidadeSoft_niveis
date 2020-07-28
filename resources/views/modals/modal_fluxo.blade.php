
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Fluxo de Conta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate action="{{url("/Fluxo/salvar")}}" onsubmit="return checkForm(this);">
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
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_Conta">Conta:</b>
                                <select class="form-control input-border-bottom" name="Cod_Conta" id="Cod_Conta"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach($conta as $conta)
                                        @can('view_conta', $conta)
                                            <option value="{{ $conta->Codigo }}">
                                                Ag:{{ $conta->Cod_Age }}-{{ $conta->Dig_Age }} /
                                                CC:{{ $conta->CC }}-{{ $conta->Digito }}</option>
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
                        <b class="ls-label-text" for="Data">Data:</b>
                        <input type="date" class="form-control input-border-bottom" name="Data" id="Data" 
                            required minlength="" maxlength="10"  value="{{ date('Y-m-d') }}">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Saldo">Saldo:</b>
                            <input type="text" class="form-control input-border-bottom" name="Saldo" id="Saldo" minlength="3" 
                            maxlength="10" value="0.00" required onblur="saldo()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Empresa">Empresa:</b>
                        <select class="form-control input-border-bottom" required id="Empresa" name="Empresa">
                            <option value="">Selecione</option>
                            @foreach($empresa as $empresa)
                            @can('view_empresa', $empresa)
                                <option value="{{ $empresa->Codigo }}">{{ $empresa->Razao_Social }}</option>
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
                    <div class="form-row">
                     
                        {{ csrf_field() }}
                        <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                        <input  class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos'/>
                    </form>
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
function saldo() {
        var desc = parseFloat(document.getElementById('Saldo').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Saldo').value = lim;
    }
  </script>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
            </div>
        </div>
    </div>
</div>
