
<!-- The Modal -->
 <div class="modal fade" id="myModal">
     <div class="modal-dialog  modal-lg">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Cadastro de Clientes/Fornecedores</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 @if(!isset($id))
                     <form method="post" class="needs-validation" novalidate
                         action="{{ url("/Clifor/salvar") }}">
                     @else
                         <form method="post" action="{{ url("/Clifor/salvar/$id") }}"
                             enctype="multipart/form-data">
                 @endif
                 <div class="form-row">
                    <div class="form-group col-lg-12" hidden>
                        <b class="ls-label-text" for="RG">User_ID:</b>
                        <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id"
                        readonly value="{{ Auth::user()->id }}" >
                    </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-lg-12">
                         <label for="Nome_Fantasia">Nome Fantasia:</label>
                         <input type="text" class="form-control input-border-bottom" name="Nome_Fantasia" required
                             id="Nome_Fantasia" placeholder="Nome Fantasia ou Apelido" minlength="4" maxlength="60"
                             value="{{ isset($clifor->Nome_Fantasia) ? $clifor->Nome_Fantasia : '' }}">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                 </div>

                 <div class="form-row">
                     <div class="form-group col-lg-8">
                         <label for="Razao_Social">Razão Social:</label>
                         <input type="text" class="form-control input-border-bottom" name="Razao_Social" disabled
                             id="Razao_Social" placeholder="P. Física (Campo não necessário)" minlength="4"
                             maxlength="60">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="Fis_Jur">Tipo de Pessoa:</label>
                         <select onchange="verifica(this.value)" class="form-control input-border-bottom" id="Fis_Jur"
                             name="Fis_Jur">
                             <option value="F">Física</option>
                             <option value="J">Jurídica</option>
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
                     <div class="form-group col-lg-4 ">
                         <label for="Data_Nascimento">Data de Nascimento:</label>
                         <input type="text" class="form-control input-border-bottom date" name="Data_Nascimento"
                         placeholder="DD/MM/AAAA" id="Data_Nascimento">
                         
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                         <script type="text/javascript">
            $(function () {
                $('#Data_Nascimento').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
                     </div>

                     <div class="form-group col-lg-4">
                         <label for="Estado_Civil">Estado Civil:</label>
                         <select class="form-control input-border-bottom" id="Estado_Civil" name="Estado_Civil">
                             <option value="">Selecione</option>
                             <option value="S">Solteiro</option>
                             <option value="C">Casado</option>
                             <option value="V">Viúvo</option>
                             <option value="D">Divorciado</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>

                     <div class="form-group col-lg-4">
                         <label for="Sexo">Sexo:</label>
                         <select class="form-control input-border-bottom" id="Sexo" name="Sexo">
                             <option value="0">Selecione</option>
                             <option value="M">Masculino</option>
                             <option value="F">Feminino</option>
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
                     <div class="form-group col-lg-4">
                         <label for="Telefone">Telefone:</label>
                         <input type="text" class="form-control input-border-bottom" name="Telefone" id="Telefone"
                             placeholder="00-0000-0000">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>

                     <div class="form-group col-lg-4">
                         <label for="Comercial">Número Comercial ou Fax:</label>
                         <input type="text" class="form-control input-border-bottom" name="Comercial" id="Comercial"
                             placeholder="00-00000-0000">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="">Celular:</label>
                         <input type="text" class="form-control input-border-bottom" name="Celular" id="Celular"
                             placeholder="00-00000-0000">
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
                         <label for="CPF">CPF:</label>
                         <input type="text" class="form-control input-border-bottom" name="CPF" id="CPF" maxlength="18"
                             minlength="11" placeholder="Somente os números" onblur="validarCPF(this)">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="RG">RG:</label>
                         <input type="text" class="form-control input-border-bottom" name="RG" id="RG" maxlength="14"
                             min="6" placeholder="Somente os números">
                         <div class="invalid-feedback">
                             Mínimo 6 caracteres
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>

                     <div class="form-group col-lg-4">
                         <label for="CNPJ">CNPJ:</label>
                         <input type="text" class="form-control input-border-bottom" name="CNPJ" id="CNPJ" disabled
                             placeholder="P. Física (CNPJ não necessário)" maxlength="18" onblur="validarCNPJ(this)">
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
                         <label for="IM">Incrição Municipal:</label>
                         <input type="text" class="form-control input-border-bottom" name="IM" id="IM" minlength="7"
                             maxlength="10">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="IE">incrição Estadual:</label>
                         <input type="text" class="form-control input-border-bottom" name="IE" id="IE" minlength="9"
                             maxlength="13">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="IEST">Ins. Est. do Substituto Tributario:</label>
                         <input type="text" class="form-control input-border-bottom" name="IEST" id="IEST" minlength="9"
                             maxlength="14">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-lg-6">
                         <label for="Email">Email:</label>
                         <input type="email" class="form-control input-border-bottom" name="Email" id="Email"
                             placeholder="algo@algo.com">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-6">
                         <label for="Site">Web Site:</label>
                         <input type="text" class="form-control input-border-bottom" name="Site" id="Site"
                             placeholder="www.algo.com">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                 </div>
                 <hr>
                 <div class="form-row">
                     <div class="form-group col-lg-3">
                         <label for="Tip">Tipo:</label>
                         <select class="form-control input-border-bottom" id="Tip" name="Tip">
                             <option value="C">Cliente</option>
                             <option value="F">Fornecedor</option>
                             <option value="A">Cliente/Fornecedor</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-3">
                         <label for="Class_ABC">Curva ABC:</label>
                         <select class="form-control input-border-bottom" id="Class_ABC" name="Class_ABC">
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-3">
                         <label for="Cli_Atacado">Atacadista?</label>
                         <select class="form-control input-border-bottom" id="Cli_Atacado" name="Cli_Atacado">
                             <option value="1">Sim</option>
                             <option value="0">Não</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-3">
                         <label for="Perfil">Perfil do Cliente:</label>
                         <select class="form-control input-border-bottom" id="Perfil" name="Perfil">
                             <option value="Consumidor">Consumidor</option>
                             <option value="Revenda">Revenda</option>
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
                     <div class="form-group col-lg-8">
                         <label for="Profissao">Profissão:</label>
                         <input type="text" class="form-control input-border-bottom" name="Profissao" id="Profissao"
                             placeholder="Profissão do Cliente" maxlength="25" minlength="4">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="Data_Cadastro">Data de Cadastro:</label>
                         <input type="text" class="form-control input-border-bottom date" name="Data_Cadastro"
                             value="{{ date('d/m/Y') }}" id="Data_Cadastro" required
                             maxlenght="8">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                         <script  type="text/javascript">
                                $(function () {
                                    $('#Data_Cadastro').datetimepicker({
                                        format: 'DD/MM/YYYY'
                                    });
                                });

                            </script>
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-lg-3">
                         <label for="SitFinanc">Situação Financeira:</label>
                         <select class="form-control input-border-bottom" id="SitFinanc" name="SitFinanc">
                             <option value="L">Livre</option>
                             <option value="B">Bloqueado</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-3">
                         <label for="LimiCred">Limite de Crédito:</label>
                         <input type="text" class="form-control input-border-bottom" name="LimiCred" id="LimiCred"
                            onblur="lim_cred()" value="0.00">
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-6">
                         <label for="PercDescAcresc"> Descontos ou Acréscimos (%):</label>
                         <input type="text" class="form-control input-border-bottom" name="PercDescAcresc"
                            onblur="desc_ac()" id="PercDescAcresc" placeholder="" maxlength="3" value="0.00">
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
                         <label for="Vendedor">Vendedor:</label>
                         <select class="form-control input-border-bottom" id="Vendedor" name="Vendedor" required>
                             <option value=""></option>
                             @foreach($user as $u)
                                @if( $u->adm === Auth::user()->id )
                                     <option value="{{ $u->id }}">
                                        {{ $u->name }}
                                     </option>
                                 @endif
                             @endforeach
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="Local_UltMov">Local do ultimo Movimento:</label>
                         <select class="form-control input-border-bottom" id="Local_UltMov" name="Local_UltMov">
                             <option value="">Selecione</option>
                             <option value="PED">Pedido</option>
                             <option value="OS">OS</option>
                             <option value="NF">NF</option>
                         </select>
                         <div class="invalid-feedback">
                             Por favor, Campo Obrigatório!
                         </div>
                         <div class="valid-feedback">
                             Tudo certo!
                         </div>
                     </div>
                     <div class="form-group col-lg-4">
                         <label for="Data_UltMov">Data do Ultimo Movimento:</label>
                         <input type="text" class="form-control input-border-bottom" name="Data_UltMov"  value="{{ date('d/m/Y') }}"
                             id="Data_UltMov">
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
                         <label for="Empresa">Empresa:</label>
                         <select class="form-control input-border-bottom" id="Empresa" name="Empresa">
                             <option value="0">Selecione</option>
                            
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
                     <div class="form-group col-lg-4">
                         <label for="Ativo">Situação do Cadastro:</label>
                         <select class="form-control input-border-bottom" id="Ativo" name="Ativo">
                             <option value="1">Ativo</option>
                             <option value="2">Inativo</option>
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
                     <div class="form-group col-lg-12">
                         <label for="Observacoes">Observções sobre o Cliente:</label>
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
                 <div class="form-row">
                     <div class="form-group col-lg-12">
                         <label for="Aviso">Aviso ao Cliente/Fornecedor:</label>
                         <textarea type="text" class="form-control input-border-bottom" name="Aviso" id="Aviso"
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
                     $('input').on("keypress", function (e) {
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
                     <button class="btn btn-success">Cadastrar</button>
                     <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
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

         for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
         Resto = (Soma * 10) % 11;

         if ((Resto == 10) || (Resto == 11)) Resto = 0;
         if (Resto != parseInt(strCPF.substring(9, 10))) return false;

         Soma = 0;
         for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
         Resto = (Soma * 10) % 11;

         if ((Resto == 10) || (Resto == 11)) Resto = 0;
         if (Resto != parseInt(strCPF.substring(10, 11))) return false;
         return true;
     }
     alert(TestaCPF(strCPF));

     function validarCNPJ(el) {
         if (!_cnpj(el.value)) {

             alert("CNPJ inválido! - " + el.value);

             // apaga o valor
             el.value = "";
         } else {

         }
     }

     function validarCPF(el) {
         if (!TestaCPF(el.value)) {

             alert("cpf inválido! - " + el.value);

             // apaga o valor
             el.value = "";
         } else {x
         }
     }

 </script>
 <script>
     function verifica(value) {
         var cnpj = document.getElementById("CNPJ");
         var rg = document.getElementById("RG");
         var cpf = document.getElementById("CPF");
         var razao = document.getElementById("Razao_Social");
         var estado = document.getElementById("Estado_Civil");
         var sexo = document.getElementById("Sexo");

         if (value == "F") {
            estado.disabled = false;
             sexo.disabled = false;
             cnpj.disabled = true;
             cnpj.placeholder = "P. Física (CNPJ não necessário)"
             razao.disabled = true;
             razao.placeholder = "P. Física (Campo não necessário)"
             rg.disabled = false;
             rg.placeholder = "Somente os Números"
             cpf.disabled = false;
             cpf.placeholder = "Somente os Números"
             Sexo.disabled = false;
            Estado_Civil.disabled = false;
         } else if (value == "J") {
             estado.disabled = true;
             sexo.disabled = true;
             cnpj.disabled = false;
             cnpj.placeholder = "Somente os Números"
             razao.disabled = false;
             razao.placeholder = "Razão Social"
             rg.disabled = true;
             rg.placeholder = "P. Jurídica (RG não necessário)"
             cpf.disabled = true;
             cpf.placeholder = "P. Jurídica (CPF não necessário)"
             Sexo.disabled = true;
            Estado_Civil.disabled = true;
         }
     };
     function lim_cred() {
        var desc = parseFloat(document.getElementById('LimiCred').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimiCred').value = lim;
    }

    function desc_ac() {
        var desc = parseFloat(document.getElementById('PercDescAcresc').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('PercDescAcresc').value = lim;
    }
 </script>
