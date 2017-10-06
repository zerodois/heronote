<!DOCTYPE html>
<html>
<head>
    <title>Heronote</title>

    <link rel="stylesheet" href="/icomoon/css/style.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/geral.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import 'https://fonts.googleapis.com/css?family=Open+Sans';
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            background-color: #FCFCFC;
        }
        .content {
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 96px;
        }
        span {
            display: block;
            width: 60%;
            margin: auto;
            font-family: 'Open Sans', sans-serif;
        }
        span.dica {
            color: #666;
            position: absolute;
            width: 100%;
            bottom: 40px;
        }
        code {
            background-color: #DEDED3;
            padding: 5px;
            display: inline-block;
            border: thin solid #ccc;
            border-radius: 2px;
            user-select: all;
        }
        footer span {
            width: auto;
            display: inline;
        }
        div.login {
            margin-top: 50px;
        }
        a {
            font-family: 'Open Sans', sans-serif;
            text-decoration: none;
        }


        @media (max-width: 480px) {
            span {
                width: 85%;
            }
            .title {
                font-size: 20vw;
            }
            .hidden-sm { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <i class="icon-heronote title"></i>
            <span>Heronote é uma ferramenta para guardar informações, realizar anotações e qualquer outra coisa que queira fazer <i class="fa fa-smile-o" aria-hidden="true"></i></span>
            <span>Para utilizar, é só especificar o caminho em que deseja salvar a informação. Como por exemplo <code>{{{ url('/') }}}/exemplo</code>. Depois é só escrever o que quiser, e tudo já está salvo <i class="fa fa-heart red-text" aria-hidden="true"></i>
            </span>
            
            @if( isset($data['url']) )
                <div class="login">
                    <span> Para anotações privadas, faça login</span>
                    <a href="{{ $data['url'] }}" class="primary-link black-text">Login com Facebook <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    </a>
                </div>
            @endif
            <span class="dica hidden-sm">
                Dica: Você pode organizar as anotações em diretórios, como por exemplo<br> <code>{{{ url('/') }}}/escola/matematica</code> e <code>{{{ url('/') }}}/escola/portugues</code>
            </span>
        </div>
    </div>
    @include('footer')
</body>
</html>
