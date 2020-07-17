@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript"> 
  jQuery(function($){
    $("#Numero_Rem").mask("99999999999");
   $("#Cod_Conv").mask("99999999999");    
  });
</script>
<div class="main-panel"style="margin-top:60px">
<a href="{{ url("/Cadastro/boleto_remessa") }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
  <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Remessa
                </h4>
            </div>
            <div class="card-body">

        <!-- Modal body -->
        <div class="modal-body">
          @if(!isset($id))
          <form method="post" class="needs-validation" novalidate action="{{url("/Boleto_remessa/salvar")}}">
           @else
           <form method="post" action="{{url("/Boleto_remessa/salvar/$id")}}" enctype="multipart/form-data">
            @endif
            <div class="form-row">
             
              <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Data">Data da Remessa:</b>
                <input type="text" class="form-control input-border-bottom" name="Data" id="Data" 
                value="{{isset($boleto_remessa->Data) ? $boleto_remessa->Data : '' }}"  required readonly>
                <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Hora">Hora da Remessa:</b>
                <input type="text" class="form-control input-border-bottom" name="Hora" id="Hora" 
                value="{{isset($boleto_remessa->Hora) ? $boleto_remessa->Hora : '' }}" readonly required >
                <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-2">
                <b class="ls-label-text" for="Numero_Rem">Num da Remessa</b>
                <input type="text" class="form-control input-border-bottom" name="Numero_Rem" id="Numero_Rem"
                value="{{isset($boleto_remessa->Numero_Rem) ? $boleto_remessa->Numero_Rem : '' }}" readonly required >
                <div class="invalid-feedback">
                  Por favor, Campo Obrigatório!
                </div>
                <div class="valid-feedback">
                  Tudo certo!
                </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="Cod_Conv">Convênio da Cobrança</b>
                <select class="form-control input-border-bottom"  name="Cod_Conv">
              @foreach($convenio as $convenio)
              @can("view_convenio",$convenio)
              <option value="{{$convenio->Codigo}}" {{ $boleto_remessa->Cod_Conv == $convenio->Codigo ? "selected" : "" }} >{{ $convenio->Convenio}}</option>
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
                <b class="ls-label-text" for="Arquivo">Caminho do Arquivo:</b>
                <input type="text" class="form-control input-border-bottom" name="Arquivo" id="Arquivo" required
                value="{{isset($boleto_remessa->Arquivo) ? $boleto_remessa->Arquivo : '' }}">
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
      <button class="btn btn-success">Salvar</button>
      <a href="{{ url("/Cadastro/boleto_remessa") }}"  class="btn btn-danger ml-3">Cancelar</a>
    </form>
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

</div>
</div>
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
