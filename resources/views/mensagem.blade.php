

@if(Session::get("sucesso") != null)
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{ session::get("sucesso") }}
</div>
@endif

@if(Session::get("erro") != null)
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{ session::get("erro") }}
</div>
@endif




