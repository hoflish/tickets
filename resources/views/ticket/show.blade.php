@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="browser icon"></i>Fiche Ticket N° {{ $ticket->id}}
              
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                         <table class="ui red table">
                           <tr>
                             <td>Message</td>
                             <td>{{ $ticket->message}}</td>
                           </tr>
                           <tr>
                             <td>Priorité</td>
                             <td>{{ $ticket->priorite->nom}}</td>
                           </tr>
                           <tr>
                             <td>Etat</td>
                             <td>{{ $ticket->etat}}</td>
                           </tr>
                           <tr>
                             <td>Crée le :</td>
                             <td>{{ $ticket->created_at}}</td>
                           </tr>
                           <tr>
                             <td>Utilisateur :</td>
                             <td>{{ $ticket->user->name}}</td>
                           </tr>
                         </table>
                         <table class="ui blue table">
                           <tr>
                             <td>Description</td>
                             <td>Duree</td>
                             <td>Technicien</td>
                             <td>Date</td>
                           </tr>
                           @foreach ($traitements as $traitement)
                             <tr>
                               <td>{{ $traitement->description }}</td>
                               <td>{{ $traitement->duree }} min</td>
                               <td>{{ $traitement->technicien->name }}</td>
                               <td>{{ $traitement->created_at }}</td>
                             </tr>
                           @endforeach

                         </table>
                          @if($ticket->etat!='traité')
                         <a href="{{ url('ticket/'.$ticket->id.'/traiter')}}" class="btn btn-primary">Traiter</a>
                          @endif
                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
