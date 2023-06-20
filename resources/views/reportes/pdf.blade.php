<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: justify;
        }

        h3 {
            text-align: center;
        }

        p {
            text-align: justify;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
            text-align: justify;
        }

        .label {
            font-weight: bold;
            width: 100px;
            flex: 0 0 120px;
        }

        .value {
            flex: 1;
            margin-right: 10px;
        }

        .image-container {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }

        .image-container img {
            margin-left: 15%;
            margin-right: 15%;
        }

        .image-container small {
            margin-left: 25%;
            margin-right: 25%;
            
        }

        img {
            width: 35%;
        }

        img.p {
            width: 100%;
            height: 10%;
        }

        
    </style>
    <title>REPORTE DE ACTIVOS</title>
</head>

<body>
    <div align="center">
        <img class="p" src="{{ asset('storage/bane.png') }}" >
    </div>
    <p> Se genera un informe detallado de los activos fijos enviados para reparación en un período específico,
        desde el {{ \Carbon\Carbon::parse($fechas->fecha_inicial)->timezone('America/Bogota')->format('d/m/Y') }}
        hasta el {{ \Carbon\Carbon::parse($fechas->fecha_final)->timezone('America/Bogota')->format('d/m/Y') }}.
        Se proporciona información sobre las reparaciones realizadas y los resultados obtenidos.
    </p>

    @foreach ($activos as $activo)
        <div class="container">
            <h3>INFORMACION DEL ACTIVO </h3>
            <div class="row">
                <span class="label">Fecha de envío:</span>
                <span class="value">{{ $activo->created_at->timezone('America/Bogota')->format('d/m/Y') }}</span>
                <span class="label">Elemento:</span>
                <span class="value">{{ $activo->name }}</span>
                <span class="label">Tipo:</span>
                <span class="value">{{ $activo->type }}</span>
            </div>
            <div class="row">
                <span class="label">Activo Fijo:</span>
                <span class="value">{{ $activo->active }}</span>
                <span class="label">Serial:</span>
                <span class="value">{{ $activo->serial }}</span>
                <span class="label">Marca:</span>
                <span class="value">{{ $activo->mark }}</span>
            </div>
            <div class="row">
                <span class="label">Origen:</span>
                <span class="value">{{ $activo->centro->name }}</span>
            </div>
            <div class="row">
                <span class="label">Observación de envío:</span>
                <span class="value">{{ $activo->observations }}</span>
            </div>
            <div class="row">
                <span class="label">Técnico que recibe:</span>
                <span class="value">{{ $activo->tecnico1 }}</span>
                <span class="label">Fecha de recepción:</span>
                <span
                    class="value">{{ \Carbon\Carbon::parse($activo->entrega)->timezone('America/Bogota')->format('d/m/Y') }}</span>

            </div>            
            <div class="row">
                <span class="label">Observación de recepción:</span>
                <span class="value">{{ $activo->observations2 }}</span>
            </div>

            <div class="row">
                <span class="label">Fecha de entrega:</span>
                <span class="value">{{ $activo->updated_at->timezone('America/Bogota')->format('d/m/Y') }}</span>
                <span class="label">Técnico que entrega:</span>
                <span class="value">{{ $activo->tecnico2 }}</span>
            </div>
            <div class="row">
                <span class="label">Observación de entrega:</span>
                <span class="value">{{ $activo->observations3 }}</span>
            </div>

            <div class="image-container">
                @php
                    $count = 0;
                @endphp
                @foreach ($images as $image)
                    @if ($image->elemento_id == $activo->id)
                        @php
                            $count++;
                        @endphp
                        <br>
                        @if ($count == 1)
                            <div style="text-align: left;">
                                <img src="{{ asset('storage/' . $image->url) }}">
                                <br>
                                <small>activo enviado</small>
                            </div>
                        @elseif ($count == 2)
                            <br>
                            <div style="text-align: right;">
                                <img src="{{ asset('storage/' . $image->url) }}">
                                <br>
                                <small>activo reparado</small>
                                <br>
                                <br>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>

        </div>

        <hr>
    @endforeach

</body>

</html>
