@extends('layouts.site')

@section('conteudo')
<div class="title m-b-md error-404">
    404
    <p>Ooops: Page Not Found!</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                <img src="{{ asset('img/errors/404.png') }}">
            </p>
        </div>
    </div>
</div>
@endsection