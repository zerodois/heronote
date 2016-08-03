<!DOCTYPE html>
<html>
<head>
    <title>Heronote</title>

    <link rel="stylesheet" href="/icomoon/css/style.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/geral.css">
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
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <i class="icon-heronote title"></i>
            <span>Heronote é uma ferramenta para guardar informações, realizar anotações e qualquer outra coisa que queira fazer <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
            <span>Para utilizar, é só especificar o caminho em que deseja salvar a informação. Como por exemplo <code>{{{ url('/') }}}/exemplo</code>. Depois é só escrever o que quiser, e tudo já está salvo <i class="fa fa-heart red-text" aria-hidden="true"></i>
            </span>
            <span class="dica">
            Dica: Você pode organizar as anotações em diretórios, como por exemplo<br> <code>{{{ url('/') }}}/escola/matematica</code> e <code>{{{ url('/') }}}/escola/portugues</code>
            </span>
        </div>
    </div>
</body>
</html>
