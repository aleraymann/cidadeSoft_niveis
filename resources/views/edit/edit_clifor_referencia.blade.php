@extends("template")

@section("conteudo")
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
<div class="main-panel" style="margin-top:60px">   
  <a href="{{ url()->previous() }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
  </a>
  <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Referência
                </h4>
            </div>
            <div class="card-body">
<!-- Modal body -->
<div class="modal-body">
  @if(!isset($id))
  <form method="post" class="needs-validation" novalidate action="{{url("/Clifor/referencia/salvar")}}">
   @else
   <form method="post" action="{{url("/Clifor/referencia/salvar/$id")}}" enctype="multipart/form-data">
    @endif

    <div class="form-row">
      <div class="form-group col-lg-2" hidden>
        <label for="Cod_CliFor">Nome do Cliente:</label>
        <select class="form-control input-border-bottom" id="Cod_CliFor" name="Cod_CliFor" required>
          <option></option>
          @foreach($clifor as $clifor)
          <option value="{{$clifor->Codigo}}" {{ $clifor_referencia->Cod_CliFor == $clifor->Codigo ? "selected" : "" }} >{{ $clifor->Razao_Social}}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Loja_Banco"> Banco/Loja de Referência</label>
        <input type="text" class="form-control input-border-bottom" name="Loja_Banco" id="Loja_Banco" maxlength="45"
        value="{{isset($clifor_referencia->Loja_Banco) ? $clifor_referencia->Loja_Banco : '' }}">
        
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Conta"> Número da conta no Estabelecimento</label>
        <input type="text" class="form-control input-border-bottom" name="Conta" id="Conta"
        value="{{isset($clifor_referencia->Conta) ? $clifor_referencia->Conta : '' }}">
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Telefone">Telefone do Estabelecimento</label>
        <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone"
        value="{{isset($clifor_referencia->Telefone) ? $clifor_referencia->Telefone : '' }}">
        <div class="invalid-feedback">
          Campo obrigatório!
        </div>
        <div class="valid-feedback">
          Tudo certo!
        </div>
      </div>
      <div class="form-group col-lg-3">
        <label for="Ult_Compra">Data da última compra</label>
        <input type="text" class="form-control input-border-bottom" name="Ult_Compra" id="Ult_Compra"
        value="{{isset($clifor_referencia->Ult_Compra) ? $clifor_referencia->Ult_Compra : '' }}">
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
    </div>
    <div class="form-row">
      <div class="form-group col-lg-2">
          <label for="Valor_UltCompra">Valor da última compra</label>
          <input type="text" class="form-control input-border-bottom" name="Valor_UltCompra" id="Valor_UltCompra" maxlength="10"
          value="{{isset($clifor_referencia->Valor_UltCompra) ? $clifor_referencia->Valor_UltCompra : '' }}">
          <div class="invalid-feedback">
            Campo obrigatório!
          </div>
          <div class="valid-feedback">
            Tudo certo!
          </div>
        </div>
        <div class="form-group col-lg-3">
          <label for="Limite">Limite que tem no Estabelecimento</label>
          <input type="text" class="form-control input-border-bottom" name="Limite" id="Limite" placeholder="" maxlength="10"
          value="{{isset($clifor_referencia->Limite) ? $clifor_referencia->Limite : '' }}">
          <div class="invalid-feedback">
            Campo obrigatório!
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