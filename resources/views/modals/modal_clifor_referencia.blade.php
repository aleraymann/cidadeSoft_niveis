
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
   $("#Telefone").mask("99-9999-9999");
   $("#Conta").mask("999999999999999");
   $("#Limite").mask("99999999.99", {reverse: true});
   $("#Valor_UltCompra").mask("99999999.99", {reverse: true})
 });
</script> 

<!-- Modal body -->
<div class="modal-body">
  <form method="post" class="needs-validation" novalidate action="{{url("/Clifor/referencia/salvar")}}" onsubmit="return checkForm(this);">
  <div class="form-row">
            <div class="form-group col-lg-12" hidden>
                <b class="ls-label-text" for="RG">User_ID:</b>
                <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                    value="{{ Auth::user()->id }}">
            </div>
        </div>
    <div class="form-row">
      <div class="form-group col-lg-1" hidden>
        <label for="Cod_CliFor">Nome do Cliente:</label>
        <input type="text" class="form-control input-border-bottom" name="Cod_CliFor" id="Cod_CliFor" 
        value="{{$clifor->Codigo}}" readonly>
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-4">
        <label for="Loja_Banco"> Banco/Loja de Referência</label>
        <input type="text" class="form-control input-border-bottom" name="Loja_Banco" id="Loja_Banco" maxlength="45" required>
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Conta"> Num. da conta no Estabelecimento</label>
        <input type="text" class="form-control input-border-bottom" name="Conta" id="Conta">
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Telefone">Telefone do Estabelecimento</label>
        <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone">
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-lg-4">
        <label for="Ult_Compra">Data da última compra</label>
        <input type="text" class="form-control input-border-bottom" name="Ult_Compra" id="Ult_Compra" placeholder="DD/MM/AAAA">
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
        <script type="text/javascript">
            $(function () {
                $('#Ult_Compra').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            </script>
      </div>
      <div class="form-group col-lg-4">
        <label for="Ult_Compra">Valor da última compra</label>
        <input type="text" class="form-control input-border-bottom" name="Valor_UltCompra"
        require id="Valor_UltCompra" maxlength="10">
        
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-4">
        <label for="Limite">Limite que tem no Estabelecimento</label>
        <input type="text" class="form-control input-border-bottom" name="Limite" id="Limite"
        placeholder="" maxlength="10" require>
        <div class="invalid-feedback">
          Campo obrigatório!
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
    
    {{ csrf_field() }}
    <button class="btn btn-success" name="cadastrar"> Salvar</button>
  </form>
</div>
<!-- <div class="form-row">-->
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
    </script>