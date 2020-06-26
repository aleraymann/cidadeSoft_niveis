
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro Contrato</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                <form method="post" class="needs-validation" novalidate action="{{url("/Contrato/salvar")}}" onsubmit="return checkForm(this);">
                   @else
                   <form method="post" action="{{url("/Contrato/salvar/$id")}}" enctype="multipart/form-data">
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_CliFor">Cliente/Fornecedor:</b>
                            <select class="form-control input-border-bottom"
                                name="Cod_CliFor" required>
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
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Dia_Venc">Dia do Venc das Parcelas:</b>
                            <input type="text" class="form-control input-border-bottom" name="Dia_Venc" id="Dia_Venc" minlength="1" 
                            maxlength="5" value="0" required onblur="comissao()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Parceria">Parceria:</b>
                            <select class="form-control input-border-bottom" name="Parceria" id="Parceria" required onchange="verifica(this.value)">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Parceiro">Parceiro:</b>
                            <input type="text" class="form-control input-border-bottom" name="Parceiro" id="Parceiro" minlength="3" 
                            maxlength="60" disabled placeholder="Parceiro não necessário">
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
                            <b class="ls-label-text" for="Perc_Comissao">Comissão:</b>
                            <input type="text" class="form-control input-border-bottom" name="Perc_Comissao" id="Perc_Comissao" minlength="3" 
                            maxlength="3" value="0.00" required onblur="perc_Comissao()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data">Data do Contrato:</b>
                            <input type="date" class="form-control input-border-bottom" name="Data" id="Data" required >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Tipo_Cob">Tipo de Cobrança:</b>
                            <select class="form-control input-border-bottom" name="Tipo_Cob" id="Tipo_Cob" required>
                                <option value="">Selecione</option>
                                <option value="Boleto">Boleto</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Depósito">Depósito</option>
                                <option value="Dinheiro">Dinheiro</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Convenio">Convenio:</b>
                            <select class="form-control input-border-bottom"
                                name="Convenio" required>
                                <option value="">Selecione</option>
                                @foreach($convenio as $convenio)
                                   @can('view_convenio', $convenio)
                                        <option value="{{ $convenio->Codigo }}">{{ $convenio->Convenio }}</option>
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
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor">Valor da Mensalidade:</b>
                            <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" minlength="3" 
                            maxlength="10" value="0.00" required onblur="valor()">
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
                         <label for="Observacoes">Observções Gerais:</label>
                         <textarea type="text" class="form-control input-border-bottom" name="Observacoes" id="Observacoes"
                             placeholder=""></textarea>
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
function comissao() {
        var desc = parseFloat(document.getElementById('Comissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Comissao').value = lim;
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
<script>
     function verifica(value) {
         var parceria = document.getElementById("Parceria");
         var parceiro = document.getElementById("Parceiro");
         if (value == "0") {
            parceiro.disabled = true;
            parceiro.placeholder = "Parceiro não necessário";
            parceiro.required= false;
         } else if (value == "1") {
            parceiro.disabled = false;
            parceiro.placeholder = "Digite o seu Parceiro";
            parceiro.required= true;
         }
     };
     function perc_Comissao() {
        var desc = parseFloat(document.getElementById('Perc_Comissao').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Perc_Comissao').value = lim;
    }

    function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }
 </script>