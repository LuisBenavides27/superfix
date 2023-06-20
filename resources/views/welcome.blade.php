<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SuperFix | Activos</title>
</head>

<body class="body">
    <div class="button-container">
        
        @if (Auth::check())
            <a class="btn btn-outline-primary btn-lg new" href="{{ route('dashboard') }}">DASHBOARD</a>
        @else
            <a class="btn btn-outline-primary btn-lg new" href="{{ route('login') }}">INGRESAR</a>
        @endif

    </div>

</body>

</html>

<style>
    .body {
        background-image: url('/storage/superfix.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .img-container {
        width: 100%;
        max-width: 600px;
        height: auto;
        margin: 0 auto;
    }

    .cont {
        text-align: center;
    }

    h1.small {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 50px;
    }

    a.new {
        position: fixed;
        bottom: 4em;
        right: 4em;
        background-color: #8F0005;
        border-radius: 1.5em;
        color: white;
        text-transform: uppercase;
        padding: 1em 1.5em;
    }

    @media only screen and (max-width: 600px) {
        .img-container {
            width: 90%;
            max-width: none;
            height: auto;
            margin: 2em auto;
        }

        a.new {
            position: fixed;
            bottom: 2em;
            right: 2em;
        }
    }
</style>