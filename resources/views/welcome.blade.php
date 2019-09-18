<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>Links App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-right: 80px;
            }

            .title {
                font-size: 84px;
            }

            .links a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .box-des {
                width: 430px;
                height: 200px;
                text-align: left;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
    <a href="{{ route('Links.submit') }}" class="btn btn-success btn-block">Webサイトを登録する</a>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Links App
            </div>
            <div class="container box-des">
                あなただけのオリジナルのLinksを創ろう<br>
                たった一度、よく使うWebサイトのURLを登録するだけでオリジナルの「Links」が完成します。
            </div>
        </div>

        <div class="content">
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Links</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr>
                                <th scope="row">{{ $link->id }}</th>
                                <td class="links"><a href="{{ $link->url }}">{{ $link->title }}</a></td>
                                <td>{{ $link->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </body>
</html>
