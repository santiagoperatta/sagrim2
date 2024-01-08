<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Visado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .column {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            color: green;
            font-weight: bold;
        }

        .honorarios {
            list-style-type: none;
            padding: 0;
        }

        .archivo-link {
            display: inline-block;
            margin-top: 5px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Certificado de Visación Numero de Expediente: <strong>{{ $expediente->nro_expediente }}</h2>
        </div>

        <div class="column">
            <div class="section">
				Certificamos que se ha efectuado la visación de/l/los plano/s de:
                <p>Usuario: <strong>{{ $expediente->user->name }}</strong></p>
                <p>Email: <strong>{{ $expediente->user->email }}</strong></p>
            </div>

            <!-- Otras secciones aquí -->

        </div>

        <div class="column">
            <div class="section">
                <p class="section-title">Honorarios:</p>
                <ul class="honorarios">
                    @php
                        $totalHonorarios = 0;
                    @endphp

                    @foreach($expediente->honorarios as $honorario)
                        <li><strong>{{ $honorario->articulo }}</strong> - ${{ $honorario->valor }}</li>
                        
                        @php
                            $totalHonorarios += $honorario->valor;
                        @endphp
                    @endforeach
                </ul>

                <p><strong>TOTAL:</strong> ${{ $totalHonorarios }}</p>
            </div>

            <div class="section">
                <p class="section-title">Archivos PDF:</p>
                @php
                    $contadorArchivos = 1;
                @endphp

                @foreach (Storage::files('public/archivos/expediente' . $expediente->id) as $file)
                    @if(pathinfo($file, PATHINFO_EXTENSION) == 'pdf')
                        <a class="archivo-link" href="{{ asset('storage/archivos/expediente' . $expediente->id . '/' . basename($file)) }}" target="_blank">{{ basename($file) }}</a><br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>