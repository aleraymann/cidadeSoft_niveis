
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
                <form method="post" class="needs-validation" novalidate action="{{url("/Fidelidade/salvar")}}" onsubmit="return checkForm(this);">
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
          <div class="form-group col-lg-6">
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="Usado" name="Usado" value="1">Pontos já utilizados?
                    </label>
                  </div>
            </div>
            </div>
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="Cod_CliFor">Cli/For:</b>
                                <select class="form-control input-border-bottom" name="Cod_CliFor" id="Cod_CliFor"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach($clifor as $clifor)
                                   @can('view_clifor', $clifor)
                                        <option value="{{ $clifor->Codigo }}">{{ $clifor->Nome_Fantasia }}</option>
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
                            <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Venda">Venda:</b>
                            <input type="text" class="form-control input-border-bottom" name="Venda" id="Venda" 
                            maxlength="10"  required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                            <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Valor">Valor:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" minlength="3" 
                            maxlength="10" value="0.00" required onblur="valor()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Pontos">Pontos:</b>
                            <input type="text" class="form-control input-border-bottom" name="Pontos" id="Pontos" 
                            maxlength="5"  required>
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
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-12">
                            <b class="ls-label-text" for="Pedidos">Pedidos:</b>
                            <input type="text" class="form-control input-border-bottom" name="Pedidos" id="Pedidos" 
                            maxlength="80"  required>
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
function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
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
