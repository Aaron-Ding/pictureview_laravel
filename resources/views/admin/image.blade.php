@extends('layouts.app')

@section('content')
    <style>
        .max{width:100%;height:100%;}
        .min{width:20%;height:20%;}
    </style>
    <div>

        <form action="{{ url('/storeinto') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="profile_image" id="exampleInputFile">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <div class="row">
            <hr>
            @foreach ($picture as $info)
                <div>
                    <hr>
                    <img id = '{{$info->filename}}' src = {{$info->link}} style = "CURSOR:hand; width:20%; height:20%" onclick = "fun1()" >

                    <form action={{'image/'.$info->id}} method="POST" style="display: inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                    <a href="https://google.com" class="btn btn-success">查看发表回复</a>
                    <!--<button id = 'zoomin' class="btn" onclick = 'fun1()'>放大</button>-->
                </div>

            @endforeach
            <script>
               // $( document ).ready(function(){
                   // $('#backgroudpic_1534175430.jpg').fun1(function(){
                      //  console.log('haha');
                      //  $(this).toggleClass('max');
                      //  $(this).toggleClass('min');
                  //  });
               // });


                function fun1(){
                    console.log('{{$info->filename}}');
                    var x =document.getElementById('{{$info->filename}}')
                    x.classList.toggle('max');
               }
            </script>

@endsection