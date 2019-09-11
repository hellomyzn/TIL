<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('./css/deepbreath/style.css') }}">
</head>
<body>

    <audio  autoplay loop >
        <source src="{{ asset('mp3/see.mp3') }}">
        <p>audioに対応していない場合のメッセージ</p>
    </audio>

    <div class="wrapper" style="background: url( {{ asset('./image/see.jpeg') }} )  no-repeat center top fixed; background-size: cover;">

        <div id="timer">00:00:000</div>
        <button id="start">start</button>
        <button id="stop">stop</button>
        <button id="reset">reset</button>
    </div>
</body>
</html>
<script src="{{ asset('./js/deepbreath.js') }}"></script>
