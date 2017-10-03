@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{!isset($tag) ? 'Criar tag' : 'Editar tag'}}</div>

                <div class="panel-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url(!isset($tag) ? '/painel/tags/criar' : '/painel/tags/atualizar/' . $tag->id) }}"enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <label for="tag" class="col-md-2 control-label hidden-xs hidden-sm">Tag:</label>

                            <div class="col-md-4">
                                <input id="tag" type="text" class="form-control" name="tag" placeholder="Título da tag" value="{{ $tag->tag or old('tag') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao" class="col-md-2 control-label hidden-xs hidden-sm">Descrição:</label> 

                            <div class="col-md-4">
                                <textarea id="descricao" rows="3" class="form-control" name="descricao" placeholder="Descrição da tag (opcional)">{{ $tag->descricao or old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection