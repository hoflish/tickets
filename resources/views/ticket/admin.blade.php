<table class="table table-striped table-bordered table-hovered ">
  <tr>
    <td>Priorité</td>
    <td>Etat</td>
    <td>Utilisateur</td>
    <td>Actions</td>
  </tr>
  @foreach ($tickets as $ticket)
    <tr>
      <td>{{ $ticket->priorite->nom}}</td>
      <td>{{ $ticket->etat}}</td>
      <td>{{ $ticket->user->name}}</td>
      <td>
        <a href="{{ url('ticket/'.$ticket->id.'/consulter')}}" class="btn btn-info">Consulter</a>
      </td>
    </tr>
  @endforeach
</table>
