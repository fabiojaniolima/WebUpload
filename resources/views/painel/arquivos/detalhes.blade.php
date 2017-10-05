@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalhes do arquivo</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-{{ session('status') }}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('msg') }}
                    </div>
                    @endif
                    <ul>
                        <li><span class="destaque">Título:</span> {{ $info->titulo }}
                        <li><span class="destaque">Extensão:</span> {{ $info->extensao }} 
                        <li><span class="destaque">Tamanho:</span> {{ Converter::bytes($info->tamanho) }}
                        <li><span class="destaque">Carregado em:</span> {{ $info->carregado }}
                        <li><span class="destaque">E-mail do owner:</span> {{ $info->owner }}
                        <li><span class="destaque">Tag:</span> {{ $info->tag }}
                        <li><span class="destaque">Hash</span>:</li>
                        <ul>
                            <li><span class="destaque">MD5</span>: {{ $info->md5 }}</li>
                            <li><span class="destaque">SHA256</span>: {{ $info->sha256 }}</li>
                        </ul>
                    </ul>

                    <ul>
                        <li>
                            <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                            <span class="destaque">Para baixar:</span> 
                            <a title="Download" href="{{ url('/painel/arquivos/download', $info->id) }}">Clique aqui!</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).on('click', 'a[data-method="delete"]', function (e) {
        e.preventDefault();

        var tituloPost = $(this).parents('tr').children('td:first').text();
        if (confirm('O arquivo "' + tituloPost + '" será excluido!')) {
            window.location = $(this).attr('href');
        }
    });
</script>
@endpush
@endsection