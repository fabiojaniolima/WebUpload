@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="main-box infographic-box">
                            <i class="fa fa-file"></i>
                            <span class="headline">Uploads</span>
                            <span class="value">{{ $num_uploads or '0' }}</span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="main-box infographic-box">
                            <i class="fa fa-tag"></i>
                            <span class="headline">Tags</span>
                            <span class="value">{{ $num_tags or '0'}}</span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="main-box infographic-box">
                            <i class="fa fa-user"></i>
                            <span class="headline">Usuários</span>
                            <span class="value">{{ $num_usuarios or '0' }}</span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="main-box infographic-box">
                            <i class="fa fa-calendar"></i>
                            <span class="headline">Hoje</span>
                            <span class="value">{{ $hoje or '0' }}</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
