@extends('layouts.site')

@section('conteudo')
<div class="title m-b-md">
    Política WebUpload
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                O <a href="{{ url('/github') }}">{{ config('app.name', 'Laravel') }}</a>
                é um projeto open source distribuido sob uma licença <a href="{{ url('/github')}}">MIT</a>.
            </p>
            <p>
                Você é livre para utilizar este software como bem entender, entretanto
                deve está ciente de que responderá legalmente caso o utilize para
                finalidades ilegais ou ilegítimas que possam violar direitos autorais
                ou prejudicar terceiros frente as leis vigentes no pais.
            </p>
        </div>
    </div>
</div>
@endsection