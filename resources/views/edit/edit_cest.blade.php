@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="main-panel" style="margin-top:60px">
<a href="{{ url("/Cadastro/cest") }}" class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de CEST
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Cest/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Cest/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="CEST">CEST:</b>
                            <input type="text" class="form-control input-border-bottom" name="CEST" id="CEST"
                                minlength="3" maxlength="10"
                                value="{{ isset($cest->CEST) ? $cest->CEST : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="NCM">NCM:</b>
                            <select class="form-control input-border-bottom" required id="NCM" name="NCM">
                                @foreach($ncm as $ncm)
                                @can('view_ncm', $ncm)
                                    <option value="{{ $ncm->NCM }}"
                                        {{ $cest->NCM == $ncm->NCM ? "selected" : "" }}>
                                        {{ $ncm->NCM }}</option>
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
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Descricao	">Descrição:</b>
                            <input type="text" class="form-control input-border-bottom" name="Descricao" id="Descricao"
                                placeholder="" minlength="5" maxlength="45"
                                value="{{ isset($cest->Descricao) ? $cest->Descricao : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Mínimo 5 caracteres!
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
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/cest") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
