<div class="table-responsive">
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
				<th>Trabajador</th>
				<th>Proyecto</th>
				<th>Día</th>
				<th>Tipo</th>
                <th>Hora Inicio</th>
                <th>Hora Final</th>
                <th>Tiempo</th>
				<th>Ticket</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr>
					<td>{{ $entry->name }}</td>
					<td>{{ $entry->project }}</td>
                    <td>{{ $entry->date }}</td>
					<td>{{ $entry->type }}</td>
                    <td>{{ $entry->time_in }}</td>
                    <td>{{ $entry->time_out }}</td>
                    <td>{{ Helpers::formatSeconds($entry->secs) }}</td>

                    @if ($entry->ticket_status == 'open')
                        <td>
                            <a href="{{ route('tickets.edit', $entry->ticket_id) }}">Editar</a>
                        </td>
                        <td>
                            <span class="label label-success }}">Abierto</span>
                        </td>
					@elseif ($entry->time_out != null)
						<td><a href="{{ url('/tickets/create', $entry->id) }}">Nuevo</a></td>
                        <td></td>
                    @else
                        <td></td>
                        <td></td>
					@endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $entries->links() }}
