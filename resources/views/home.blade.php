
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>sinoramamail</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<div id="title" style="text-align: center;">
    <h1>sinoramagroup</h1>
    <div style="padding: 5px; font-size: 16px;">sinoramammail 5</div>
</div>
<hr>
<div id="content">
    <ul>
    @foreach ($fucks as $picture)
        <div class="title">
            <a href="{{ url('picture/'.$picture->id) }}">
                <h4>{{ $picture->name }}</h4>
            </a>
        </div>
        <div class="body">
            <p>{{ $picture->time}}    {{$picture->comment }}</p>
        </div>
    @endforeach
    </ul>
</div>

</body>
</html>