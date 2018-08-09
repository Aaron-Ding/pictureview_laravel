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

                            @foreach ($comments as $article)
                                @foreach($info as $picture)
                                    @if ($picture-> id  == $article->article_id)
                                <hr>
                                <div class="article">
                                    <h4>{{ $article->nickname.'评论'.$picture->name }}</h4>
                                    <div class="content">
                                        <p>
                                            {{ $article->content }}
                                        </p>
                                        <p>
                                            {{ $article->created_at }}
                                        </p>
                                        <a href="{{ url('admin/picture/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                                        <form action="{{ url('admin/picture/'.$article->id) }}" method="POST" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </div>

                                </div>

                            @endif
                            @endforeach
    @endforeach
@endsection