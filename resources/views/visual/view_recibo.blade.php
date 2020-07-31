@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a  href="{{ url()->previous() }}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Recibo referente a <strong> {{ $recibo->Referente }} </strong> com data de <strong>{{ $recibo->Data }}</strong>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
    
                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Pago/Recebido:</b>
                                    <label>{{ $recibo->Pag_Rec == "1"? "Pago":"Recebido" }} </label><br> 
                                
                                <b class="ls-label-text">Recebido de:</b>
                                    <label> Cod do Cli/For: {{ $recibo->Rec_De }} </label><br> 
                               
                                <b class="ls-label-text">Pago para:</b>
                                    <label> Cod do Cli/For: {{ $recibo->Pag_Para}} </label><br> 
                               
                                <b class="ls-label-text">Valor:</b>
                                    <label>{{ $recibo->Valor}} </label><br> 
                              
                                <b class="ls-label-text">Data:</b>
                                    <label>{{ $recibo->Data }} </label><br> 

                                <b class="ls-label-text">Referente:</b>
                                    <label>{{ $recibo->Referente }} </label><br> 

                                    <b class="ls-label-text">Transação:</b>
                                    <label>{{ $recibo->Transacao}} </label><br> 
                              
                                <b class="ls-label-text">Empresa:</b>
                                    <label>{{ $recibo->Empresa }} </label><br> 
                                    </td>
                                    <td>
                                <b class="ls-label-text">Beneficiário</b><br> 
                                <b class="ls-label-text">Nome:</b>
                                    <label>{{ $recibo->Ben_Nome }} </label><br> 

                                <b class="ls-label-text">Endereço:</b>
                                    <label>{{ $recibo->Ben_End }} </label><br> 

                                <b class="ls-label-text">CPF ou CNPJ:</b>
                                    <label>{{ $recibo->Ben_CPF_CNPJ }} </label><br> 
                                    </td>
                                    <td>
                                    <b class="ls-label-text">Emitente</b><br> 
                                <b class="ls-label-text">Nome:</b>
                                    <label>{{ $recibo->Em_Nome }} </label><br> 

                                <b class="ls-label-text">Endereço:</b>
                                    <label>{{ $recibo->Em_End }} </label><br> 

                                <b class="ls-label-text">CPF ou CNPJ:</b>
                                    <label>{{ $recibo->Em_CPF_CNPJ }} </label><br> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
