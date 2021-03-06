<?php

namespace App\Model\Ticket;

use App\Model\Helpers;
use App\Model\Ticket\Ticket;
use App\Model\Record\NightShift;

class TicketRepository
{
    use Helpers;

	/**
	 * Instantiate a repository's model.
	 *
	 * @return Ticket
	 */
	public function getModel()
	{
		return new Ticket;
    }

    /**
     * Filtro los tickets por usuario.
     *
     * @param $userName
     * @return void
     */
    public function ticketsByUserName(array $data)
    {
        if (isset($data['userName'])) {
            return $this->getModel()
                ->join('users', 'users.id', '=', 'tickets.user_id')
                ->where('users.username', $data['userName'])
                ->select('tickets.id', 'tickets.user_id', 'tickets.record_id', 'tickets.closed_by_id', 'tickets.status', 'tickets.type', 'tickets.comments')
                ->with('record', 'user', 'closedBy')
                ->orderBy('status')
                ->orderBy('tickets.created_at', 'desc')
                ->paginate(config('options.paginate_number_items'))
                ->appends($data);
        }

        return $this->getModel()
            ->with('record', 'user', 'closedBy')
            ->orderBy('status')
            ->latest()
            ->paginate(config('options.paginate_number_items'));
    }

    /**
     * Creo un nuevo ticket para modificar un registro.
     */
	public function create(array $data)
	{
		return $this->getModel()->create($data);
    }

    /**
     * Actualizo el ticket.
     *
     * @param Ticket $ticket
     * @param Request $data
     * @return void
     */
    public function update(Ticket $ticket, $data)
    {
        $ticket->comments = $data->get('comments');
        $ticket->save();
    }

    /**
     * Cierro el ticket.
     *
     * @param Ticket $ticket
     * @param Request $data
     * @return void
     */
    public function close(Ticket $ticket, $data)
    {
        $record = $ticket->record;
        $record->project_id =$data->get('project');
        $record->check_in = $this->addSeconds($data->get('check_in'));
        $record->check_out = $this->addSeconds($data->get('check_out'));
		$record->night_shift = NightShift::getTimeInSeconds($record->check_in, $record->check_out);
        $record->save();

        $ticket->comments = $data->get('comments');
        $ticket->status = 'close';
        $ticket->closed_by_id = auth()->id();
        $ticket->save();
    }

    /**
     * Elimino el ticket.
     *
     * @param $data
     * @return boolean
     */
    public function delete($id)
    {
        $ticket = $this->getModel()->find($id);

        if (is_null($ticket)) {
            return false;
        }

        if ($ticket->status == 'close') {
            return false;
        }

        return $ticket->delete();
    }
}







