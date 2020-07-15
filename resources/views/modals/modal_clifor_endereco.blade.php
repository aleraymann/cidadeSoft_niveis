
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
   $("#CEP").mask("99999999");
 });
</script> 
<!-- Adicionando Javascript CEP-->
<script type="text/javascript" >
 $(document).ready(function() {
   
   function limpa_formulário_cep() {
               // Limpa valores do formulário de cep.
               $("#Endereco").val("");
               $("#Bairro").val("");
               $("#Cidade").val("");
               $("#Estado").val("");
               $("#Cod_IBGE").val("");
             }

           //Quando o campo cep perde o foco.
           $("#CEP").blur(function() {
             
               //Nova variável "cep" somente com dígitos.
               var cep = $(this).val().replace(/\D/g, '');
               
               //Verifica se campo cep possui valor informado.
               if (cep != "") {
                 
                   //Expressão regular para validar o CEP.
                   var validacep = /^[0-9]{8}$/;
                   
                   //Valida o formato do CEP.
                   if(validacep.test(cep)) {
                     
                       //Preenche os campos com "..." enquanto consulta webservice.
                       $("#Endereco").val("...");
                       $("#Bairro").val("...");
                       $("#Cidade").val("...");
                       $("#Estado").val("...");
                       $("#Cod_IBGE").val("...");
                       
                       //Consulta o webservice viacep.com.br/
                       $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                         
                         if (!("erro" in dados)) {
                               //Atualiza os campos com os valores da consulta.
                               $("#Endereco").val(dados.logradouro);
                               $("#Bairro").val(dados.bairro);
                               $("#Cidade").val(dados.localidade);
                               $("#Estado").val(dados.uf);
                               $("#Cod_IBGE").val(dados.ibge);
                               
                           } //end if.
                           else {
                               //CEP pesquisado não foi encontrado.
                               limpa_formulário_cep();
                               alert("CEP não encontrado.");
                             }
                           });
                   } //end if.
                   else {
                       //cep é inválido.
                       limpa_formulário_cep();
                       alert("Formato de CEP inválido.");
                     }
               } //end if.
               else {
                   //cep sem valor, limpa formulário.
                   limpa_formulário_cep();
                 }
               });
         });
 
       </script>
       <!-- Modal body -->
       <div class="modal-body">
        <form method="post" class="needs-validation" novalidate action="{{url("/Clifor/endereco/salvar")}}" onsubmit="return checkForm(this);">
        <div class="form-row">
            <div class="form-group col-lg-12" hidden>
                <b class="ls-label-text" for="RG">User_ID:</b>
                <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                    value="{{ Auth::user()->id }}">
            </div>
        </div>
          <div class="form-row">
            <div class="form-group col-lg-2" hidden>
              <label for="Cod_CliFor">Nome do Cliente:</label>
              <input type="text" class="form-control" name="Cod_CliFor" id="Cod_CliFor" value="{{ $clifor->Codigo }} ">
            </div>
            <div class="form-group col-lg-2">
              <label for="Tipo_Endereco">Tipo do Endereço</label>
              <select class="form-control input-border-bottom" id="Tipo_Endereco" name="Tipo_Endereco" required>
                <option></option>
                <option value="C">Correspondência</option>
                <option value="E">Entrega</option>
                <option value="A">Ambos</option>
              </select>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="CEP">CEP</label>
              <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP"
              placeholder="000000000" required>
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Cod_IBGE"> Codido IBGE</label>
              <input type="number" class="form-control input-border-bottom" name="Cod_IBGE" id="Cod_IBGE">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
          
            <div class="form-group col-lg-4">
              <label for="Endereco">Endereço</label>
              <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-1">
              <label for="Estado">Estado:</label>
              <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado"
              placeholder="">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>

          </div>
          <div class="form-row">
            <div class="form-group col-lg-1">
              <label for="Numero">Número</label>
              <input type="number" class="form-control input-border-bottom" name="Numero" id="Numero">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Bairro">Bairro</label>
              <input type="text" class="form-control input-border-bottom" name="Bairro" id="Bairro"
              placeholder="Bairro">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div> <div class="form-group col-lg-2">
              <label for="Complemento">Complemento</label>
              <input type="text" class="form-control input-border-bottom" name="Complemento" id="Complemento"
              placeholder="">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-4">
              <label for="">Ponto de Referência</label>
              <input type="text" class="form-control input-border-bottom" name="Ponto_Referencia" id="Ponto_Referencia">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label for="Cidade">Cidade:</label>
              <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade"
              placeholder="">
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
          

          <!-- <div class="form-row">-->
            {{ csrf_field() }}
            <button class="btn btn-success" name="cadastrar"> Salvar</button>
          </form>
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
  </script>