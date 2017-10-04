@extends('layouts.site')

@section('conteudo')
<div class="title m-b-md">
    WebUpload
</div>

<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('msg') }}
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">Formulário de upload</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-2 control-label hidden-xs hidden-sm">Email:</label>

                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-2 control-label hidden-xs hidden-sm">Título:</label> 

                        <div class="col-md-10 ">
                            <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título do arquivo (opcional)" value="{{ old('titulo') }}">

                            @if ($errors->has('titulo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                        <label for="tag" class="col-md-2 control-label hidden-xs hidden-sm">Tag:</label> 

                        <div class="col-md-10">
                            <input id="tag" type="text" class="form-control" name="tag" placeholder="Tag de identificação" value="{{ old('tag') }}">

                            @if ($errors->has('tag'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tag') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('arquivo') ? ' has-error' : '' }}">
                        <label for="arquivo" class="col-md-2 control-label hidden-xs hidden-sm">Arquivo:</label> 

                        <div class="col-md-10">
                            <input id="arquivo" type="file" class="form-control" name="arquivo">

                            @if ($errors->has('arquivo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('arquivo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i> Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Scripts -->
<script src="/js/app.js"></script>
@include('includes.fechar-alert')
@endpush