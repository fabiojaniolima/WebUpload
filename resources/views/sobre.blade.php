@extends('layouts.site')

@section('conteudo')
<div class="title m-b-md">
    Sobre WebUpload
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                O <a href="{{ url('/github') }}">{{ config('app.name', 'Laravel') }}</a>
                é um projeto open source distribuido sob uma licença <a href="{{ url('/github')}}">MIT</a>.
            </p>
            <p>
                Este projeto permite que você crie categorias (tags) e as utilize para
                receber arquivos carregados por você ou por terceiros. Após estes arquivos
                terem sido carregados, estarão disponíveis na conta do criador da tag,
                logo poderão ser gerenciados por estes.
            </p>
            <p>
                Professores e instrutores que precisam receber material dos alunos
                adoram está ferramenta. Eles criam uma tag, por exemplo: EXERCICIO01,
                repassa para seus alunos e ai é só aguardar estes enviarem os arquivos.
                Os envolvidos serão notificados por email.
            </p>
        </div>
    </div>
</div>
@endsection