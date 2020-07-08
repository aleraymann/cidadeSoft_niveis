@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">

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

                    <form method="post" action="{{ url("/User/salvar/$id") }}"
                        enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                                <div>
                                    <input id="name" type="text"
                                        class="form-control input-border-bottom"
                                        name="name" value="{{ isset($user->name) ? $user->name : '' }} " required autofocus>
                                    <label for="password" class="placeholder">Nome</label>

                                </div>
                             </div>

                            <div class="form-group form-floating-label col-4">
                                    <div>
                                        <input id="email" type="email"
                                            class="form-control input-border-bottom"
                                            name="email" value="{{ isset($user->email) ? $user->email : '' }} " required>
                                        <label for="email" class="placeholder">E-mail</label>

                                    </div>
                                </div>
                            
                            <div class="form-group form-floating-label col-2">
                            <div>
                                <input id="adm" type="adm" class="form-control input-border-bottom" name="adm"
                                value="{{ isset($user->adm) ? $user->adm : '' }} ">
                                <label for="empresa" class="placeholder">Cod Adm</label>
                            </div>
                            </div>
                           
                        </div>


                            <div class="form-action">
                                <a href="{{ url("/User") }}" id="show-signin"
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