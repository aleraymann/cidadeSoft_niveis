
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro Forma de Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                <form method="post" class="needs-validation" novalidate action="{{url("/Forma/salvar")}}" onsubmit="return checkForm(this);"> 
                   @else
                   <form method="post" action="{{url("/Forma/salvar/$id")}}" enctype="multipart/form-data">
                    @endif
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
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Descricao	">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                            placeholder="" required  minlength="2" maxlength="45">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 2 caracteres!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Comi_Operad">Comissão a ser paga:</b>
                            <input type="text" class="form-control input-border-bottom" name="Comi_Operad" id="Comi_Operad"
                            onblur="comi_Operad()" minlength="3" value="0.00" required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Tx_Antecip">Tava de antecip. de Crédito:</b>
                            <input type="text" class="form-control input-border-bottom" name="Tx_Antecip" id="Tx_Antecip"
                            onblur="tx_Antecip()" minlength="3" value="0.00" required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Tipo">Código:</b>
                            <select class="form-control input-border-bottom" id="Tipo" name="Tipo">
                                <option value="DI">Dinheiro</option>
                                <option value="CH">Cheque</option> 
                                <option value="CC">Cartão de Credito</option> 
                                <option value="CD">Cartão de Débito</option> 
                                <option value="BO">BoLeto</option> 
                                <option value="DM">Duplicata Mercantil</option> 
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Destino">Destino do Pagamento:</b>
                            <select class="form-control input-border-bottom" id="Destino" name="Destino">
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Dest_CliFor">Cli/For de Destino:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dest_CliFor" id="Dest_CliFor" minlength="1" placeholder="COD CliFor">
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
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
 function comi_Operad() {
        var desc = parseFloat(document.getElementById('Comi_Operad').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Comi_Operad').value = lim;
    }

    function tx_Antecip() {
        var desc = parseFloat(document.getElementById('Tx_Antecip').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Tx_Antecip').value = lim;
    }
</script>