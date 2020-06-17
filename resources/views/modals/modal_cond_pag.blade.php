
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Condições de Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                <form method="post" class="needs-validation" novalidate action="{{url("/Condicao/salvar")}}">
                 @else
                 <form method="post" action="{{url("/Condicao/salvar/$id")}}" enctype="multipart/form-data">
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
                            <b class="ls-label-text" for="Condicao	">Condição</b>
                            <input type="text" class="form-control input-border-bottom" name="Condicao" id="Condicao"
                            placeholder="1x, 30/60, 15 D.D." required  minlength="2" maxlength="45">
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="ParcDias">Dias entre parcelas:</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcDias" id="ParcDias" required>
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
                            <b class="ls-label-text" for="ParcForma">Forma de Pagamento no Recebimento</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcForma" id="ParcForma" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="ParcJuros">Juro a ser aplicado:</b>
                            <input type="text" class="form-control input-border-bottom" name="ParcJuros" id="ParcJuros" 
                            onblur="parcJuros()" minlength="3" value="0.00">
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
                        <button class="btn btn-success">Cadastrar</button>
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
 
 function parcJuros() {
        var desc = parseFloat(document.getElementById('ParcJuros').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ParcJuros').value = lim;
    }
</script>