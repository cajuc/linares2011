<!-- Creo la variable que almacena los datos de la liga requerida -->
{{--*/ $liga = ObtenerRecursos::obtenerDatosClasificacion($categoria); /*--}}

<!-- En caso de no haber datos de la liga requerida se muestra un mensaje -->
@if (!$liga)
	<div class="text-center">
		@if (isset($moreDetails))
			<span class="alert alert-danger col-xs-12 col-sm-12 col-md-offset-3 col-md-6">!!Lo siento, aún no hay datos de clasificación.</span>
		@else
			<span class="alert alert-danger col-xs-12 col-sm-12">!!Lo siento, aún no hay datos de clasificación.</span>
		@endif
	</div>
@else

<span class="header-clasification">{{ $liga[0]->liga }}</span>

<table class="table table-condensed table-spacing" id="clasificacion">
	<tr>
		<th></th>
		<th>Equipo</th>
		<th class="hidden-xs text-center">PJ</th>
		<th class="hidden-xs text-center">PG</th>
		<th class="hidden-xs text-center">PE</th>
		<th class="hidden-xs text-center">PP</th>

		@if (isset($moreDetails))
			<th class="hidden-xs text-center">GF</th>
			<th class="hidden-xs text-center">GC</th>
			<th class="hidden-xs text-center">DG</th>
		@endif

		<th class=" text-center">Puntos</th>
	</tr>

	

	@foreach ($liga as $key => $equipo)
		<!-- Creo la variable para mostrar el total de partidos jugados -->
		{{--*/ $gamesPlayed = $equipo->partidos_ganados + $equipo->partidos_empatados + $equipo->partidos_perdidos /*--}}
		@if ($key == 0)
			<tr class="active">
				<td>{{ $key + 1 }}</td>
				
				@if ($equipo->club)
					<td>{{ $equipo->club }}</td>
				@else
					<td>{{ $equipo->nombre }}</td>
				@endif
				
				<td class="hidden-xs text-center">{{ $gamesPlayed }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_ganados }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_empatados }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_perdidos }}</td>

				@if (isset($moreDetails))
					<td class="hidden-xs text-center">{{ $equipo->goles_a_favor }}</td>
					<td class="hidden-xs text-center">{{ $equipo->goles_en_contra }}</td>
					<td class="hidden-xs text-center">{{ $equipo->goles_a_favor - $equipo->goles_en_contra }}</td>
				@endif

				<td class="text-center">{{ $equipo->puntos }}</td>
			</tr>
		@else
			<tr>
				<td>{{ $key + 1 }}</td>
				
				@if ($equipo->club)
					<td>{{ $equipo->club }}</td>
				@else
					<td>{{ $equipo->nombre }}</td>
				@endif
				
				<td class="hidden-xs text-center">{{ $gamesPlayed }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_ganados }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_empatados }}</td>
				<td class="hidden-xs text-center">{{ $equipo->partidos_perdidos }}</td>

				@if (isset($moreDetails))
					<td class="hidden-xs text-center">{{ $equipo->goles_a_favor }}</td>
					<td class="hidden-xs text-center">{{ $equipo->goles_en_contra }}</td>
					<td class="hidden-xs text-center">{{ $equipo->goles_a_favor - $equipo->goles_en_contra }}</td>
				@endif

				<td class="text-center">{{ $equipo->puntos }}</td>
			</tr>
		@endif
	@endforeach
</table>
@endif

