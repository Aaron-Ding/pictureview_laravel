<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{font:12px/1.2 Verdana, sans-serif; padding:0 10px;}
        a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}
        h2{font-size:13px; margin:15px 0 0 0;}
    </style>
    <title>Learn Laravel 5</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link media="screen" rel="stylesheet" href="http://www.bootcss.com/p/buttons/css/buttons.css" />
    <link media="screen" rel="stylesheet" href="../storage/content/colorbox.css" />
    <link media="screen" rel="stylesheet" href="css/style.css" />
    <script src="../storage/content/jquery.colorbox.js"></script>
    <script src="js/audioplayer.js"></script>

</head>
<body>
<div>
    <button id = 'playmusic' class="button button-glow button-rounded button-raised button-primary" style = '
            bottom: 0;
            color: #ffec2e;
            left: 0;
            position: fixed;
            text-align: left;
            z-index: 10000;
            overflow: visible;'
    >play/pause music</button>
</div>
<div class="audio green-audio-player" style = 'display:none';>
    <div class="loading">
        <div class="spinner"></div>
    </div>
    <div class="play-pause-btn" style = 'display:none';>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
            <path fill="#566574" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon" id="playPause">
        </svg>
    </div>

    <div class="controls"  style = 'display:none'>
        <span class="current-time">0:00</span>
        <div class="slider" data-direction="horizontal"  style = 'display:none'>
            <div class="progress"  style = 'display:none'>
                <div class="pin" id="progress-pin" data-method="rewind"  style = 'display:none'></div>
            </div>
        </div>
        <span class="total-time" >0:00</span>
    </div>

    <div class="volume"  style = 'display:none'>
        <div class="volume-btn"  style = 'display:none'>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="#566574" fill-rule="evenodd" d="M14.667 0v2.747c3.853 1.146 6.666 4.72 6.666 8.946 0 4.227-2.813 7.787-6.666 8.934v2.76C20 22.173 24 17.4 24 11.693 24 5.987 20 1.213 14.667 0zM18 11.693c0-2.36-1.333-4.386-3.333-5.373v10.707c2-.947 3.333-2.987 3.333-5.334zm-18-4v8h5.333L12 22.36V1.027L5.333 7.693H0z" id="speaker">
            </svg>
        </div>
        <div class="volume-controls hidden"  style = 'display:none'>
            <div class="slider" data-direction="vertical"  style = 'display:none'>
                <div class="progress"  style = 'display:none'>
                    <div class="pin" id="volume-pin" data-method="changeVolume"  style = 'display:none'></div>
                </div>
            </div>
        </div>
    </div>

    <audio crossorigin>
        <source src="media/demo.mp3" type="audio/mp3">
    </audio>
</div>
<button id = 'playimg' class="button button-glow button-rounded button-raised button-primary" onclick="setBackground()"  style = '
            bottom: 0;
            color: #ff2233;
            left: 0;
            position: fixed;
            text-align: left;
            z-index: 10000;
             margin-bottom: 50px;
            overflow: visible;'
>show pic</button>
<div>
<p><a class="group2" href="../storage/content/ohoopee1.jpg" title="Me and my grandfather on the Ohoopee." style = '
      bottom:0;
      color: #010101;
      position: fixed;
      text-align: left;
      z-index: 10000;
      margin-bottom: 50px;
      overflow: visible;'
    >开始吧</a></p>


<p><a class="group2" href="../storage/content/ohoopee2.jpg" title="On the Ohoopee as a child"  style = 'display:none'>Grouped Photo 2</a></p>
<p><a class="group2" href="../storage/content/ohoopee3.jpg" title="On the Ohoopee as an adult"  style = 'display:none'>Grouped Photo 3</a></p>
</div>
<a class="button button-glow button-rounded button-raised button-primary" href="http://localhost/pictureview/public/home" style = '
            bottom: 0;
            color: #ff2233;
            right: 0;
            position: fixed;
            text-align: left;
            z-index: 10000;
             margin-bottom: 50px;
            overflow: visible;'
>back home</a>
<script>
    function goplay() {
        var audioPlayer = document.querySelector('.green-audio-player');
        var player = audioPlayer.querySelector('audio');
        if (player.paused) {
            playPause.attributes.d.value = "M0 0h6v24H0zM12 0h6v24h-6z";
            player.play();
        } else {
            playPause.attributes.d.value = "M18 12L0 24V0";
            player.pause();
        }
    }
    $(document).ready(function() {
       $('#playmusic').click(function(){
           goplay();
       });
    });
</script>
<script>
        var t = 0;
        function setBackground() {
            switch (t % 4) {
                case 0 : {
                    console.log('green');
                    $('body').css({"background":"url('../storage/content/text1.jpg') no-repeat center center fixed",'height':'100%','width':'100%','background-size': 'cover;'});
                    break;
                }
                case 1 : {
                    console.log('purple')
                    $('body').css({"background":"url('../storage/content/text2.jpg') no-repeat center center fixed",'height':'100%','width':'100%,','background-size': 'cover;'});
                    break;
                }
                case 2 : {
                    console.log('light blue');
                    $('body').css({"background":"url('../storage/content/text3.jpg') no-repeat center center fixed",'height':'100%','width':'100%','background-size': 'cover;'});
                    break;
                }
                case 3 : {
                    console.log('red');
                    $('body').css("background", "#ffffff");
                    break;
                }
            }
            t = setTimeout(function () {
                setBackground();
            }, 5000);
        }
</script>
</body>

</html>