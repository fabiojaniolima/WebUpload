@extends('layouts.app')

@push('estilos')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Preferências de Sistema</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-{{ session('status') }}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('msg') }}
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="/painel/preferencias/configuracoes">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('auto-registro') ? ' has-error' : '' }}">
                            <label for="auto-registro" class="col-md-2 control-label hidden-xs hidden-sm">Auto registro:</label>

                            <div class="col-md-4">
                                <input name="auto_registro" type="checkbox" {{ $pref['auto_registro'] or '' }} data-toggle="toggle" data-on="Ativo" data-off="Desligado" data-onstyle="success" data-offstyle="danger">
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

@push('scripts')
<script src="{{ asset('vendor/bootstrap/js/bootstrap-toggle.min.js') }}"></script>
@endpush