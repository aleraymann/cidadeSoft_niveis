
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
    $("#KmIni").mask("99999");
    $("#KmFim").mask("99999");
    $("#Indice_v").mask("9.99");
    
  });
</script> 
<!-- Modal body -->

<div class="modal-body">
  <form method="post" class="needs-validation" novalidate action="{{url("/Transportadora/valor/salvar")}}" onsubmit="return checkForm(this);">
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
        <label for="KmIni">Km Início</label>
        <input type="text" class="form-control input-border-bottom" name="KmIni" id="KmIni" placeholder=""
        required>
        <div class="invalid-feedback">
          Por Favor, Campo Obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="KmFim">Km Final</label>
        <input type="text" class="form-control input-border-bottom" name="KmFim" id="KmFim" placeholder=""
        required>
        <div class="invalid-feedback">
          Por Favor, Campo Obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-2">
        <label for="Indice_v">Índice para cobrança</label>
        <input type="text" class="form-control input-border-bottom" name="Indice_v" id="Indice_v" 
        minlength="1" value="0.00" required onblur="indice_v()">
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

        function indice_v() {
          var desc = parseFloat(document.getElementById('Indice_v').value, 2);
          lim = desc.toFixed(2);
          document.getElementById('Indice_v').value = lim;
        }
          </script>