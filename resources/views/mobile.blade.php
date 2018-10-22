<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="3dB Consult">
	<link rel="icon" href="{!! asset('images/favicon.ico') !!}">

    <title>3dB Control Horario</title>

    <!-- Styles -->
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #7C7C7C;
            display: table;
            font-weight: 100;
            font-family:  Sans-Serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 1.5em;
            margin-bottom: 40px;
        }

        .message {
            margin-bottom: 40px;
            margin-left: 2em;
            margin-right: 2em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title"><strong>¡Acceso prohibido!</strong></div>
            <div class="message">Debe de acceder desde un terminal de trabajo válido.</div>
        </div>
    </div>
</body>

</html>
