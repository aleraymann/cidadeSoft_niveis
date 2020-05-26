@extends("template")

@section("conteudo")
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
<div class="main-panel" style="margin-top:60px">   
<a href="{{ url()->previous() }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
  </a>
  <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Endereço
                </h4>
            </div>
            <div class="card-body">
      <!-- Modal body -->
      <div class="modal-body">
        @if(!isset($id))
        <form method="post" class="needs-validation" novalidate action="{{url("/Clifor/endereco/salvar")}}">
         @else
         <form method="post" action="{{url("/Clifor/endereco/salvar/$id")}}" enctype="multipart/form-data">
          @endif

          <div class="form-row">
            <div class="form-group col-lg-2" hidden>
              <label for="Cod_CliFor">Nome do Cliente:</label>
              <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor" required>
                <option></option>
                @foreach($clifor as $clifor)
                <option value="{{$clifor->Codigo}}" {{ $clifor_endereco->Cod_CliFor == $clifor->Codigo ? "selected" : "" }} >{{ $clifor->Nome_Fantasia}}</option>
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
              <label for="Tipo_Endereco">Tipo do Endereço</label>
              <select class="form-control input-border-bottom" id="Tipo_Endereco" name="Tipo_Endereco">
                <option value="{{isset($clifor_endereco->Tipo_Endereco) ? $clifor_endereco->Tipo_Endereco : '' }} ">
                  @if($clifor_endereco->Tipo_Endereco=="E")
                 Entrega
                  @elseif($clifor_endereco->Tipo_Endereco=="C")
                 Correspondência
                  @else
                 Ambos
                  @endif
                </option>
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
            <div class="form-group col-lg-1">
              <label for="CEP">CEP</label>
              <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP"
              placeholder="000000000"  value="{{isset($clifor_endereco->CEP) ? $clifor_endereco->CEP : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-1">
              <label for="Cod_IBGE"> Codido IBGE</label>
              <input type="number" class="form-control input-border-bottom" name="Cod_IBGE" id="Cod_IBGE"
              value="{{isset($clifor_endereco->Cod_IBGE) ? $clifor_endereco->Cod_IBGE : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
           
            <div class="form-group col-lg-4">
              <label for="Endereco">Endereco</label>
              <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco"
              value="{{isset($clifor_endereco->Endereco) ? $clifor_endereco->Endereco : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-1">
              <label for="Numero">Número</label>
              <input type="number" class="form-control input-border-bottom" name="Numero" id="Numero"
              value="{{isset($clifor_endereco->Numero) ? $clifor_endereco->Numero : '' }}">
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
              placeholder="Bairro"  value="{{isset($clifor_endereco->Bairro) ? $clifor_endereco->Bairro : '' }}">
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
              <label for="Complemento">Complemento</label>
              <input type="text" class="form-control input-border-bottom" name="Complemento" id="Complemento"
              placeholder=""  value="{{isset($clifor_endereco->Complemento) ? $clifor_endereco->Complemento : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="">Ponto de Referência</label>
              <input type="text" class="form-control input-border-bottom" name="Ponto_Referencia" id="Ponto_Referencia"
              value="{{isset($clifor_endereco->Ponto_Referencia) ? $clifor_endereco->Ponto_Referencia : '' }}">
              <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
              </div>
              <div class="valid-feedback">
                Tudo certo!
              </div>
            </div>
            <div class="form-group col-lg-3">
              <label for="Cidade">Cidade:</label>
              <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade"
              placeholder=" "  value="{{isset($clifor_endereco->Cidade) ? $clifor_endereco->Cidade : '' }}">
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
              placeholder="" value="{{isset($clifor_endereco->Estado) ? $clifor_endereco->Estado : '' }}">
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
            <button class="btn btn-success">Salvar</button>
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
</div>
        

        @endsection
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