<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Transportadoras
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              @if(!isset($id))
              <form method="post" class="needs-validation" novalidate action="{{url("/Transportadora/salvar")}}" onsubmit="return checkForm(this);">
                 @else
                 <form method="post" action="{{url("/Transportadora/salvar/$id")}}" enctype="multipart/form-data">
                  @endif
                  <div class="form-row">
            <div class="form-group col-lg-12" hidden>
              <b class="ls-label-text" for="user_id">User_ID:</b>
              <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
              readonly value="{{ Auth::user()->id }}" >
            </div>
          </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Razao_Social">Razão Social:</b>
                        <input type="text" class="form-control input-border-bottom" name="Razao_Social" id="Razao_Social"
                        placeholder="Razão Social" required  minlength="4" maxlength="60">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Nome_Fantasia">Nome Fantasia:</b>
                        <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia" id="Nome_Fantasia"
                        placeholder="Nome Fantasia ou Apelido" required minlength="4" maxlength="60">
                        <div class="invalid-feedback">
                          Campo Obrigatório, Mínimo 4 caracteres!
                      </div>
                      <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-2">
                    <b class="ls-label-text" for="Fis_Jur">Tipo:</b>
                    <select onchange="verifica(this.value)" class="form-control input-border-bottom" id="Fis_Jur" name="Fis_Jur" required>
                        <option value="J">Jurídica</option>
                        <option value="F">Física</option> 
                    </select>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="CEP">CEP:</b>
                    <input type="text" class="form-control input-border-bottom" name="CEP" id="CEP" placeholder="000000000" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-7">
                    <b class="ls-label-text" for="Endereco">Endereço:</b>
                    <input type="text" class="form-control input-border-bottom" name="Endereco" id="Endereco"
                    placeholder="Rua, Travessa, Avenida" required>
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
                    <b class="ls-label-text" for="Bairro">Bairro:</b>
                    <input type="text" class="form-control input-border-bottom" name="Bairro" id="Bairro" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-3">
                    <b class="ls-label-text" for="Cidade">Cidade:</b>
                    <input type="text" class="form-control input-border-bottom" name="Cidade" id="Cidade" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-2">
                    <b class="ls-label-text" for="Estado">Estado:</b>
                    <input type="text" class="form-control input-border-bottom" name="Estado" id="Estado" minlength="2" maxlength="2" 
                    placeholder="Sigla" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Email">Email:</b>
                    <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
                    placeholder="algo@algo.com" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Telefone">Telefone:</b>
                    <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                
                <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Celular">Telefone Celular:</b>
                    <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular" required>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                
                <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Comercial">Telefone Comercial:</b>
                    <input type="text" class="form-control input-border-bottom" name="Comercial" id="Comercial" required>
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
                    <b class="ls-label-text" for="CPF">CPF:</b>
                    <input type="text" class="form-control input-border-bottom" name="CPF" id="CPF" maxlength="14" disabled required onblur="validarCPF(this)"
                    placeholder="P. Jurídica (CPF não necessário)">
                    <div class="invalid-feedback">
                      Por favor, Campo Obrigatório!
                  </div>
                  <div class="valid-feedback">
                      Tudo certo!
                  </div>
              </div>
              <div class="form-group col-lg-3">
                <b class="ls-label-text" for="RG">RG:</b>
                <input type="text" class="form-control input-border-bottom" name="RG" id="RG" disabled
                minlength="4" maxlength="60" placeholder="P. Jurídica (RG não necessário)">
                <div class="invalid-feedback">
                  Campo Obrigatório, Obrigatorio!
              </div>
              <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="CNPJ">CNPJ:</b>
            <input type="text" class="form-control input-border-bottom" name="CNPJ" id="CNPJ" onblur="validarCNPJ(this)" required>
            <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="IE">Inscrição Estadual:</b>
            <input type="text" class="form-control input-border-bottom" name="IE" id="IE"  minlength="9" maxlength="13" required>
            <div class="invalid-feedback">
                Mínimo 9 caracteres!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div> 
    </div>
    <div class="form-row">
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="Tipo_Frete">Tipo de Frete:</b>
            <select class="form-control input-border-bottom" id="Tipo_Frete" name="Tipo_Frete" required>
                <option value="">Selecione</option>
                <option value="KM">KM</option>
                <option value="Destino">Destino</option> 
            </select>
            <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="FreteM">Frete por M:</b>
            <input type="text" class="form-control input-border-bottom" name="FreteM"
            onblur="fretem()" id="FreteM" maxlength="10"
            minlength="1" value="0.00" required>
            <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="FreteM2">Frete por M<sup>2</sup> :</b>
            <input type="text" class="form-control input-border-bottom" name="FreteM2"
            onblur="fretem2()" id="FreteM2" maxlength="10"
            minlength="1" value="0.00" required>
            <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-3">
            <b class="ls-label-text" for="FreteM3">Frete por M<sup>3</sup> :</b>
            <input type="text" class="form-control input-border-bottom" name="FreteM3"
            onblur="fretem3()" id="FreteM3" maxlength="10" minlength="1" value="0.00"
            required>
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
            <b class="ls-label-text" for="FretePor">Tipo de Frete:</b>
            <select class="form-control input-border-bottom" id="FretePor" name="FretePor" required>
                <option value="">Selecione</option>
                <option value="K">KM</option>
                <option value="D">Destino</option> 
            </select>
            <div class="invalid-feedback">
                Por favor, Campo Obrigatório!
            </div>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="form-group col-lg-4">
            <b class="ls-label-text" for="Empresa">Empresa:</b>
            <select class="form-control input-border-bottom" id="Empresa" name="Empresa" required>
                <option value="">Selecione</option>
                @foreach($empresa as $empresa)
                    @can("view_empresa",$empresa)
                         <option value="{{ $empresa->Codigo }}">{{ $empresa->Nome_Fantasia }}</option>
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
        <button class="btn btn-success" name="cadastrar">Cadastrar</button>
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

	function _cnpj(cnpj) {

       cnpj = cnpj.replace(/[^\d]+/g, '');

       if (cnpj == '') return false;

       if (cnpj.length != 14)
           return false;

       
       if (cnpj == "00000000000000" ||
           cnpj == "11111111111111" ||
           cnpj == "22222222222222" ||
           cnpj == "33333333333333" ||
           cnpj == "44444444444444" ||
           cnpj == "55555555555555" ||
           cnpj == "66666666666666" ||
           cnpj == "77777777777777" ||
           cnpj == "88888888888888" ||
           cnpj == "99999999999999")
           return false;

       
       tamanho = cnpj.length - 2
       numeros = cnpj.substring(0, tamanho);
       digitos = cnpj.substring(tamanho);
       soma = 0;
       pos = tamanho - 7;
       for (i = tamanho; i >= 1; i--) {
           soma += numeros.charAt(tamanho - i) * pos--;
           if (pos < 2)
               pos = 9;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(0)) return false;
       tamanho = tamanho + 1;
       numeros = cnpj.substring(0, tamanho);
       soma = 0;
       pos = tamanho - 7;
       for (i = tamanho; i >= 1; i--) {
           soma += numeros.charAt(tamanho - i) * pos--;
           if (pos < 2)
               pos = 9;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(1))
           return false;

       return true;

   }

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
      
    alert("cpf inválido! - " + el.value);

    // apaga o valor
    el.value = "";
}else{
  
  }
}
</script>
<script>
    function verifica(value){
    var cnpj = document.getElementById("CNPJ");
    var rg = document.getElementById("RG");
    var cpf = document.getElementById("CPF");

  if(value == "F"){
    cnpj.disabled = true;
    cnpj.placeholder = "P. Física (CNPJ não necessário)"
    rg.disabled = false;
    rg.placeholder = "Somente os Números"
    cpf.disabled = false;
    cpf.placeholder = "Somente os Números"
  }else if(value == "J"){
    cnpj.disabled = false;
    cnpj.placeholder = "Somente os Números"
    rg.disabled = true;
    rg.placeholder = "P. Jurídica (RG não necessário)"
    cpf.disabled = true;
    cpf.placeholder = "P. Jurídica (CPF não necessário)"
  }
};
function fretem() {
        var desc = parseFloat(document.getElementById('FreteM').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM').value = lim;
    }

    function fretem2() {
        var desc = parseFloat(document.getElementById('FreteM2').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM2').value = lim;
    }

    function fretem3() {
        var desc = parseFloat(document.getElementById('FreteM3').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM3').value = lim;
    }
</script>