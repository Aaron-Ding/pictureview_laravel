@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <a href="{{ url('admin/picture') }}" class="btn btn-lg btn-success col-xs-12">文本管理</a>
                        <a href="{{ url('admin/image') }}" class="btn btn-lg btn-success col-xs-12" style = >图片管理</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection