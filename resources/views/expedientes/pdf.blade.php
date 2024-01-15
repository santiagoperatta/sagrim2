<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
			font-weight: bolder;
			font-size: 30px;
            background-color: #6fcf85; /* Fondo verde */
            color: rgb(255, 255, 255); /* Texto blanco */
            padding: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        .expediente-info strong {
            display: block;
            margin-bottom: 10px;
        }

		.footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer img {
            max-width: 100px; /* Ajusta el tamaño de la imagen según tus necesidades */
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            Certificado de Visación
        </div>
        <div>
            Expediente N°: {{ $expediente->nro_expediente }}
        </div>
    </div>

    <div class="expediente-info">
        <p>Certificamos que se ha efectuado la visación de/l/los plano/s de</p>
        <ul class="honorarios">
            @foreach($expediente->honorarios as $honorario)
                <li><strong>{{ $honorario->trabajo }}</strong> - ${{ $honorario->valor }}</li>
            @endforeach
        </ul>
        <p>cuyo Comitente, Titular o Poseedor es</p>
        <strong style="text-transform:uppercase;">{{ $expediente->infoPersonal->nombre }}</strong>
        <table>
            <tr>
                <td><strong>Nomenclatura</strong> {{ $expediente->infoTrabajo->nomenclatura }}</td>
                <td><strong>Cuenta</strong> {{ $expediente->infoTrabajo->nro_cuenta }}</td>
                <td><strong>Tipo de Parcela</strong> {{ $expediente->infoTrabajo->tipo_parcela }}</td>
            </tr>
        </table>

		<p>Ubicacion</p>
		<table>
			<tr>
				<td><strong>Superficie total involucrada en la/s tarea/s</strong></td>
				<td><strong>Superficie</strong></td>
				<td><strong>Numero de Lote</strong></td>
			</tr>
			@foreach($expediente->honorarios as $honorario)
				<tr>
					<td>{{ $honorario->superficie_cubierta }}</td>
					<td>{{ $honorario->superficie }}</td>
					<td>{{ $honorario->nro_lote }}</td>
				</tr>
			@endforeach
		</table>

		<p> Profesionales responsables por la/s tarea/s</p>
        <table>
            <tr>
                <td><strong>Matricula</strong> {{ $expediente->user->id }}</td>
                <td><strong>Apellido y Nombre</strong> {{ $expediente->user->name }}</td>
                <td><strong>Título</strong> Ingeniero Agronomo </td>
            </tr>
        </table>

		<p> Se expide el presente CERTIFICADO DE VISACIÓN del expediente Nº	 <span style="font-weight: bold;"> {{ $expediente->nro_expediente }}</span>  del Colegio de Agrimensores
			de la Provincia de Córdoba, en el día <span style="font-weight: bold;"> {{ $expediente->updated_at }}</span></p>
			
			<img src="{{ public_path('images/sello.jpg') }}" alt="Sello" />
			<hr class="my-4" />

			<div class="footer">
				<p>Deán Funes 1392 - Córdoba - Tel/Fax (0351) - 4245544 - Email: colagrim@agrimcba.org.ar</p>
			</div>
	</div>
</body>
</html>