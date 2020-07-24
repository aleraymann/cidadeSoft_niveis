@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/inventario") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Data de Inventário
                </h4>
            </div>
            <div class="card-body">
                <div class="modal-body">
                            <form method="post" action="{{ url("/Inventario/salvar/$id") }}"
                                enctype="multipart/form-data">
                    <div class=" form-row">
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Responsavel">Cod do Responsável:</b>
                            <input type="text" class="form-control input-border-bottom text-center" name="Responsavel" id="Responsavel"
                                value="{{ isset($inventario->Responsavel) ? $inventario->Responsavel : 'Auth::user()->id' }}" readonly >
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Data">Data:</b>
                            <input type="text" class="form-control  input-border-bottom" name="Data" id="Data"
                                value="{{ isset($inventario->Data) ? $inventario->Data : '' }} " readonly>
                        </div>
                        <div class="form-group col-lg-7">
                            <b class="ls-label-text" for="Descricao">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao"
                                id="Descricao" minlength="3" required
                                value="{{ isset($inventario->Descricao) ? $inventario->Descricao : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/inventario") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>
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
</div>

@endsection
