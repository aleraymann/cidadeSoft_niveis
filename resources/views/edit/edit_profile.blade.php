@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Cod_item").mask("99999999999");
        $("#Valor").mask("99999999.99", {
            reverse: true
        });
        $("#Qtd_Alterar").mask("999999.9999", {
            reverse: true
        });
        $("#Cod_Item_Dev").mask("99999");
        $("#Qtd_Dev").mask("999999.9999", {
            reverse: true
        });
    });

</script>
<div class="main-panel ml-2" style="margin-top:60px">
    <a href="{{ url()->previous() }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição Usuários
                </h4>
            </div>
            <div class="card-body">


                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ url("/User/profile_update") }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <b class="ls-label-text" for="image">Imagem Atual: </b><br>
                                @if(auth()->user()->image != null)
                                <img src="{{ url('storage/users/'.auth()->user()->image) }}" style="max-width:100px; height:100px; border-radius:5px" >
										@else
										<img src="{{url("img/profile.jpg")}}" style="max-width:100px; height:100px" alt="Img Profile">
										@endif
                                
                            </div>
                            <div class="form-group col-lg-6">
                                <b class="ls-label-text" for="image">Alterar Foto:</b>
                                <input type="file" class="form-control" name="image" id="image">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                            <input name='LogoBanco' value='{{ Auth::user()->image }}' hidden>
                        </div><br>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                                <div>
                                    <input id="name" type="text" class="form-control input-border-bottom" name="name"
                                        value="{{ Auth::user()->name }} " required autofocus>
                                    <label for="password" class="placeholder">Nome</label>

                                </div>
                            </div>

                            <div class="form-group form-floating-label col-4">
                                <div>
                                    <input id="email" type="email" class="form-control input-border-bottom" name="email"
                                        value="{{ Auth::user()->email }} " required>
                                    <label for="email" class="placeholder">E-mail</label>

                                </div>
                            </div>
                        </div>


                        <div class="form-action">
                            <a href="{{ url("/Dashboard") }}" id="show-signin"
                                class="btn btn-danger  btn-login mr-3">Cancel</a>
                            <button class="btn btn-success  btn-login">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
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

            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#empresa").mask("9999");
    });

</script>
