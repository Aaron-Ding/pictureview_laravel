@extends('layouts.app')

@section('content')
    <style>
        .max{width:100%;height:100px;}
        .min{width:100px;height:auto;}
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
</div>

<div>
    @foreach ($picture as $urls)
<img id = 'image'src = {{$urls}} width="20%" height="20%" >

        @endforeach
</div>

    <script>
        $(function(){
            $('#image').click(function(){

                $(this).toggleClass('min');
                $(this).toggleClass('max');
            });
        });
    </script>
@endsection