
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
   $("#Indice").mask("9.99");
   
 });
</script> 

<!-- Modal body -->

<div class="modal-body">
  <form method="post" class="needs-validation" novalidate action="{{url("/Transportadora/destino/salvar")}}" onsubmit="return checkForm(this);">
  <div class="form-row">
            <div class="form-group col-lg-12" hidden>
                <b class="ls-label-text" for="RG">User_ID:</b>
                <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                    value="{{ Auth::user()->id }}">
            </div>
        </div>
    <div class="form-row">
      <div class="form-group col-lg-1" hidden>
        <label for="Cod_Transp">Transportadora:</label>
        <input type="text" class="form-control input-border-bottom" name="Cod_Transp" id="Cod_Transp" 
        value="{{$transportadora->Codigo}}" readonly
        >
      </div>
      <div class="form-group col-lg-3">
        <label for="Destino_Cidade">Cidade</label>
        <input type="text" class="form-control input-border-bottom" name="Destino_Cidade" id="Destino_Cidade" placeholder="Cidade"
        required minlength="3" maxlength="50">
        <div class="invalid-feedback">
          Mínimo 3 caracteres!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-2">
        <label for="Destino_UF">Estado de Destino:</label>
        <select class="form-control input-border-bottom" id="Destino_UF" name="Destino_UF" required>
          <option value="">Selecione</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
        <div class="invalid-feedback">
          Por favor, Campo Obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-2">
        <label for="Indice">Índice para cobrança</label>
        <input type="text" class="form-control input-border-bottom" name="Indice" id="Indice" maxlength="3"
        minlength="1" value="0.00" required onblur="indice()">
        <div class="invalid-feedback">
          Por favor, Campo Obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
    </div>
    
    <!-- <div class="form-row">-->
      {{ csrf_field() }}
      <button class="btn btn-success" name="cadastrar"> Cadastrar</button>
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
  </script>
  </div>
  <script>
            // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
                var forms = document.getElementsByClassName('needs-validation');
                // Faz um loop neles e evita o envio
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();


            function indice() {
        var desc = parseFloat(document.getElementById('Indice').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Indice').value = lim;
    }
          </script>