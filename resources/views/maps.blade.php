@extends("template")

@section("conteudo")
<div class="main-panel"  style="margin-top:60px">
<a href="{{ url()->previous() }}"  class="btn btn-primary ml-3 float-left">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="content-full">
        <div id="map-full" class="full-screen-maps">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.6194663394094!2d-51.473864084986644!3d-25.38406698380961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ef364ac447cc7f%3A0x279f2ce9aa78e50d!2sCidadeSoft%20Sistemas!5e0!3m2!1spt-BR!2sbr!4v1587057912825!5m2!1spt-BR!2sbr"
                width="100%" height="90%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</div>
@endsection
