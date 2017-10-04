@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listar arquivos</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-{{ session('status') }}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('msg') }}
                    </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Extensão</th>
                                <th>E-mail</th>
                                <th>Tag</th>
                                <th>Submetido em</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($arquivos as $arq)
                            <tr>
                                <td>{{ $arq->titulo or ' - ' }}</a></td>
                                <td>{{ File::extension($arq->caminho)}}</td>
                                <td>{{ $arq->email }}</td>
                                <td>{{ $arq->tag->tag}}</td>
                                <td>{{ $arq->created_at->format('d/m/Y à\s H:i:s') }}</td>
                                <td class="text-center">
                                    <a title="Download" href="{{ url('/painel/arquivos/download', $arq->id) }}">
                                        <i class="fa fa-download fa-lg"></i>
                                    </a>
                                    &nbsp; | &nbsp;
                                    <a title="Apagar" href="{{ url('/painel/arquivos/excluir', $arq->id) }}" data-method="delete">
                                        <i class="fa fa-trash-o fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Não existem arquivos para serem listados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    {{ $arquivos->links() }}
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