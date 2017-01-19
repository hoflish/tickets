<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Statistiques</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered">
    <tr>
      <td>Total des tickets :<span class="badge">{{ $statistiques['total'] }}</span></td>
      <td>Total des utilisateurs : <span class="badge">{{  \App\User::All()->count() }}</span></td>
    </tr>
    <tr>
      <td>
        <table class="table table-bordered table-striped">
          <tr>
            <td colspan="2"> <b>Etats</b> </td>
          </tr>
          <tr>
            <td>Création</td>
            <td><span class="badge">{{ $statistiques['creation']}}</span></td>
          </tr>
          <tr>
            <td>En cours</td>
            <td><span class="badge">{{ $statistiques['encours']}}</span></td>
          </tr>
          <tr>
            <td>Réalisée</td>
            <td><span class="badge">{{ $statistiques['realisee']}}</span></td>
          </tr>
        </table>
        <div style="width:300px;">
          <canvas id="Etats" width="200" height="200"></canvas>
        </div>
      </td>
      <td>
        <table class="table table-bordered table-striped">
          <tr>
            <td colspan="2"> <b>Priorités</b> </td>
          </tr>
          @foreach ($priorites as $priorite)
           <tr>
             <td>{{ $priorite->nom}}</td>
             <td><span class="badge">{{ $priorite->tickets->count()}}</span></td>
           </tr>
          @endforeach
        </table>
      </td>
    </tr>
  </table>
  </div>
</div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Liste des tickets   <a href="{{ url('/admin/tickets/export/xls')}}" class="btn btn-info">Exporter XLS</a></h3>
  </div>
  <div class="panel-body">
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
    {{ $tickets->render() }}
  </div>
</div>
@push('scripts')
<script>
// le canvas
  var ctx = document.getElementById("Etats");
  //les données
  var cree = ({{ $statistiques['creation']}}/{{ $statistiques['total'] }})*100;
  var encours = ({{ $statistiques['encours']}}/{{ $statistiques['total'] }})*100;
  var traite = ({{ $statistiques['realisee']}}/{{ $statistiques['total'] }})*100;
  var data = {
    labels: [
        "Création",
        "En cours",
        "Traité"
    ],
    datasets: [
        {
            data: [cree, encours, traite],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
};
var options = {
        elements: {
            arc: {
                borderColor: "#000000"
            }
        }};
// Affichage
  var myPieChart = new Chart(ctx,{
    type: 'doughnut',
    data: data,// données
    options: options
});
</script>
@endpush
