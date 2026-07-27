<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <title>{{ config('app.name') }} - Maintenance</title>
    <meta name="description" content=""/>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <style>
        html {
            overflow: hidden;
        }

        body {
            margin: 0;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Varela Round', sans-serif;
            background-color: #fff;
            overflow: hidden;
        }

        .error-banner {
            width: 100%;
            text-align: center;
            background: #000;
            padding: 50px 0;
            color: #fff;
            position: relative;
        }

        .error-banner:before, .error-banner:after {
            content: '';
            background-color: #000;
            position: absolute;
            width: 105%;
            z-index: -1;
        }

        .error-banner:before {
            height: 50px;
            left: 0;
            bottom: 100%;
            transform: rotateZ(-1deg) translateY(30px);
            box-shadow: 0 -2px 2px 1px #000;
        }

        .error-banner:after {
            height: 100px;
            left: 0;
            top: 100%;
            transform: rotateZ(3deg) translate(-5px, -52px);
            box-shadow: 0 2px 2px 0 #000;
        }

        .error-banner p {
            font-size: 25px;
            margin: 5px 0;
        }

        .error-banner p.note {
            font-size: 16px;
            margin-top: 15px;
            color: #aaa;
        }

        .dots span {
            color: #f06414;
            animation: blink 1.4s infinite both;
        }

        .dots span:nth-child(2) {
            animation-delay: .2s;
        }

        .dots span:nth-child(3) {
            animation-delay: .4s;
        }

        @keyframes blink {
            0%, 80%, 100% {
                opacity: 0;
            }
            40% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
<div class="error-banner">
    <p>Be right back!</p>
    <p>I'm doing some quick maintenance on the site<span class="dots"><span>.</span><span>.</span><span>.</span></span></p>
    <p class="note">This page refreshes automatically &mdash; the site should be back within a few minutes.</p>
</div>
</body>

</html>
