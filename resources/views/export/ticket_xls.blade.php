<table>
  <tr style="color:red;">
    <td>Priorité</td>
    <td>Etat</td>
    <td>Utilisateur</td>
  </tr>
  @foreach (\App\Ticket::All() as $ticket)
    <tr>
      <td>{{ $ticket->priorite->nom}}</td>
      <td>{{ $ticket->etat}}</td>
      <td>{{ $ticket->user->name}}</td>
    </tr>
  @endforeach
</table>
