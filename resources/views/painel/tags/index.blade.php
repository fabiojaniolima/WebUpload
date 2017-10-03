@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listar tags</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-{{ session('status') }}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('msg') }}
                    </div>
                    @endif

                    <div class="btn-opcoes">
                        <a class="btn btn-primary" href=" {{ url('/painel/tags/cad_edit') }} ">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar tag
                        </a>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Arq. associados</th>
                                <th>criada em</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $t)
                            <tr>
                                <td>{{ $t->tag }}</a></td>
                                <td class="teste">{{ $t->arquivos_count}}</td>
                                <td>{{ $t->created_at->format('d/m/Y à\s H:i:s') }}</td>
                                <td class="text-center">
                                    <a title="Editar" href="{{ url('/painel/tags/cad_edit/' . $t->id) }}">
                                        <i class="fa fa-edit fa-lg"></i>
                                    </a>
                                    &nbsp; | &nbsp;
                                    <a title="Apagar" href="{{ url('/painel/tags/excluir', $t->id) }}" data-method="delete">
                                        <i class="fa fa-trash-o fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Não existem tags para serem listadas</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $tags->links() }}
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
        if (confirm('A tag "' + tituloPost + '" e todos os arquivos associados serão excluido!')) {
            window.location = $(this).attr('href');
        }
    });
</script>
@endpush
@endsection