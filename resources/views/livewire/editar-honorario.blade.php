<div class="md:justify-center items-center p-5">
    <h3>Honorarios del Expediente</h3>
	<table>
		@foreach($honorarios as $honorario)
			<tr>
				<td>{{ $honorario->superficie_cubierta }}</td>
				<td>{{ $honorario->superficie }}</td>
				<td>{{ $honorario->nro_lote }}</td>
			</tr>
		@endforeach
	</table>
</div>