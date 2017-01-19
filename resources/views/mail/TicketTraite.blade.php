Bonjour <br>
Votre ticket  N° {{ $ticket->id }} a été traté <br>
Les traitements effectué
<hr>
<table style="background:#F5F5F5">
  <tr>
    <td>Traitement</td>
    <td>Date</td>
    <td>Par</td>
  </tr>
  @foreach ($ticket->traitements as $traitement)
    <tr>
      <td>{{ $traitement->description}}</td>
      <td>{{ $traitement->created_at}}</td>
      <td>{{ $traitement->technicien->name}}</td>
    </tr>
  @endforeach
</table>
Cordialement<br>
Service de Maintenance
