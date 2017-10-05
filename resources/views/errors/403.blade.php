@extends('layouts.site')

@section('conteudo')
<div class="title m-b-md error-404">
    403
    <p>Ooops: Acesso Não Autorizado!</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                <img src="{{ asset('img/errors/403.png') }}">
            </p>
        </div>
    </div>
</div>
@endsection