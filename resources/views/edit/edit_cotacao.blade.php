@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/cotacao")  }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Cotação
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Cotacao/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Cotacao/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                    <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Moeda">Moeda:</b>
                            <input type="text" class="form-control input-border-bottom" name="Moeda" id="Moeda" minlength="1" placeholder="Real, Euro, Dolar, etc."
                            value="{{ isset($cotacao->Moeda) ? $cotacao->Moeda : '' }} " required>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Data">Data da Cotação:</b>
                        <input type="date" class="form-control input-border-bottom" name="Data" id="Data" 
                            required  value="{{$cotacao->Data}}">
                        <div class="invalid-feedback">
                            Campo Obrigatório, Mínimo 4 caracteres!!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Cotacao">Cotação:</b>
                            <input type="text" class="form-control input-border-bottom" name="Cotacao" id="Cotacao" minlength="3" 
                            maxlength="10" value="{{ isset($cotacao->Cotacao) ? $cotacao->Cotacao : '' }} " required onblur="cotacao()">
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
                        function comissao() {
                        var desc = parseFloat(document.getElementById('Cotacao').value, 2);
                        lim = desc.toFixed(2);
                        document.getElementById('Cotacao').value = lim;
                        }

                    </script>
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/cotacao")  }}"  class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
