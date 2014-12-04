<!-- Creo la variable que almacena los datos de la liga requerida -->
{{--*/ $liga = ObtenerRecursos::obtenerDatosClasificacion($liga_id); /*--}}

<span class="header-clasification">{{ $liga[0]->liga }}</span>

<table class="table table-condensed table-spacing">
	<tr>
		<th></th>
		<th>Equipo</th>
		<th class="hidden-xs">PJ</th>
		<th class="hidden-xs">PG</th>
		<th class="hidden-xs">PE</th>
		<th class="hidden-xs">PP</th>
		<th>Puntos</th>
	</tr>

	

	@foreach ($liga as $key => $equipo)
		<!-- Creo la variable para mostrar el total de partidos jugados -->
		{{--*/ $gamesPlayed = $equipo->partidos_ganados + $equipo->partidos_empatados + $equipo->partidos_perdidos /*--}}
		@if ($key == 0)
			<tr class="active">
				<td>{{ $key + 1 }}</td>
				<td>{{ $equipo->nombre }}</td>
				<td class="hidden-xs">{{ $gamesPlayed }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_ganados }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_empatados }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_perdidos }}</td>
				<td>{{ $equipo->puntos }}</td>
			</tr>
		@else
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $equipo->nombre }}</td>
				<td class="hidden-xs">{{ $gamesPlayed }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_ganados }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_empatados }}</td>
				<td class="hidden-xs">{{ $equipo->partidos_perdidos }}</td>
				<td>{{ $equipo->puntos }}</td>
			</tr>
		@endif
	@endforeach
</table>