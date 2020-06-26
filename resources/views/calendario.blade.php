@extends("template")

@section("conteudo")
   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/pt-br.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<!-- Fullcalendar -->
    <script src="{{url("js/fullcalendar/lib/moment.min.js")}}"></script>
    <script src="{{url("js/fullcalendar/fullcalendar.min.js")}}"></script>
    <script src="{{url("js/fullcalendar/lang/pt-br.js")}}"></script>
    
   

@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
    
      <div class="main-panel">
        <div style="margin-top:60px">
        <div class="ml-2" style="margin-top:60px">
        <a href="{{ url()->previous() }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i></a>
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->    
      </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Calendário e Eventos
                <div class="btn-group float-right" role="group">
                        @can('insere_evento')
                            <button type="button" class="btn btn-success btn-rounded " data-toggle="modal"
                                data-target="#myModal">
                                <i class='fas fa-plus'></i> Eventos
                            </button>
                        @endcan
                        @can('visual_evento')
                    <a href="{{url("/Calendario/listar")}}" class="btn btn-primary btn-rounded ml-2" style="color:white">Ver Eventos</a>
                    @endcan
                    </div>
                </h4>

                @include("modals.modal_evento")
            </div>
           
            <div class="card-body">
               <div id="calendar" class="calendar"> 
              
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                
               </div>
                    
            </div>
           
        </div>
    </div>

  
</div>
@endsection


<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function checkForm(form){
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
                     // se validar desabilita o botao
                     if (form.checkValidity() === true) {
                        form.cadastrar.disabled = true;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
