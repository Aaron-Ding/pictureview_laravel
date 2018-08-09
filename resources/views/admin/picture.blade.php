@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">图片管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/picture/create') }}" class="btn btn-lg btn-primary">新增</a>
<!--route('/picture/store')-->
                        @foreach ($pictures as $article)
                            <hr>
                            <div class="article">
                                <h4>{{ $article->name }}</h4>
                                <div class="content">
                                    <p>
                                        {{ $article->time }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/picture/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/picture/'.$article->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                            <a href="{{url('/showpicture/'.$article->id)}}" class="btn btn-haha">查看发表回复</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style =  'float: right;'>
        <a href="{{ url('manage/managecomment') }}" class="btn btn-lg btn-primary">评论管理</a>
    </div>
@endsection