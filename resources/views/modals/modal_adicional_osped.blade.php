

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adicional Os/Pedidos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          @if(!isset($id))
          <form method="post" class="needs-validation" novalidate action="{{url("/AdicionalOS/salvar")}}">
           @else
           <form method="post" action="{{url("/AdicionalOS/salvar/$id")}}" enctype="multipart/form-data">
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
                <b class="ls-label-text" for="Cod_item">Cód Item</b>
                <input type="text" class="form-control input-border-bottom" name="Cod_item" id="Cod_item"
                placeholder="" required  minlength="" maxlength="11">
                <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Cod_Ref">Cód de Refêrencia do Item:</b>
                <input type="text" class="form-control input-border-bottom" name="Cod_Ref" id="Cod_Ref" minlength="5" maxlength="25" required>
                <div class="invalid-feedback"  placeholder="" >
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-5">
                <b class="ls-label-text" for="Descricao">Descrição:</b>
                <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao" minlength="5" maxlength="40" required >
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
                <b class="ls-label-text" for="Valor">Valor</b>
                <input type="text" class="form-control input-border-bottom" name="Valor" id="Valor" 
                onblur="valor()" value="0.00" required>
                <div class="invalid-feedback">
                    Por favor, Campo Obrigatório!
                  </div>
                  <div class="valid-feedback">
                    Tudo certo!
                  </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Qtd_Alterar">Quantidade a Alterar:</b>
                <input type="text" class="form-control input-border-bottom" name="Qtd_Alterar" id="Qtd_Alterar" value="0.0000" required>
              </div>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Cod_Item_Dev">Cod Item de Devoluçao:</b>
                <input type="text" class="form-control input-border-bottom" name="Cod_Item_Dev" id="Cod_Item_Dev"
                value="0" required>
              </div>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-4">
                <b class="ls-label-text" for="Cod_Ref_Dev">Cod Ref Item de Devoluçao:</b>
                <input type="text" class="form-control input-border-bottom" name="Cod_Ref_Dev" id="Cod_Ref_Dev"
                 required>
                 <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              
              <div class="form-group col-lg-4">
                <b class="ls-label-text" for="Qtd_Dev">Quantidade a Devolver:</b>
                <input type="text" class="form-control input-border-bottom" name="Qtd_Dev" id="Qtd_Dev"
                value="0.0000" required>
              </div>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
  
            <div class="form-row">
             
              {{ csrf_field() }}
              <button class="btn btn-success">Cadastrar</button>
              <input  class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos'/>
            </form>
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
  
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function TestaCPF(strCPF) {
      var Soma;
      var Resto;
      Soma = 0;
      if (strCPF == "00000000000") return false;
      if (strCPF == "11111111111") return false;
      if (strCPF == "22222222222") return false;
      if (strCPF == "33333333333") return false;
      if (strCPF == "44444444444") return false;
      if (strCPF == "55555555555") return false;
      if (strCPF == "66666666666") return false;
      if (strCPF == "77777777777") return false;
      if (strCPF == "88888888888") return false;
      if (strCPF == "99999999999") return false;
      
      for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
      
      if ((Resto == 10) || (Resto == 11))  Resto = 0;
      if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
      
      Soma = 0;
      for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
      
      if ((Resto == 10) || (Resto == 11))  Resto = 0;
      if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
      return true;
    }
    alert(TestaCPF(strCPF));
  
    function validarCNPJ(el){
      if( !_cnpj(el.value) ){
  
        alert("CNPJ inválido! - " + el.value);
  
      // apaga o valor
      el.value = "";
    }else{
       
    }
  }
  
  function validarCPF(el){
    if( !TestaCPF(el.value) ){
      
      alert("CPF inválido! - " + el.value);
  
      // apaga o valor
      el.value = "";
    }else{
        
    }
  }
  function valor() {
        var desc = parseFloat(document.getElementById('Valor').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Valor').value = lim;
    }

   
  
  </script>