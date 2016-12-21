@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Fiche Ticket N° {{ $ticket->id}}</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                         <table class="table table-striped">
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
                         <a href="{{ url('ticket/'.$ticket->id.'/traiter')}}" class="btn btn-primary">Traiter</a>

                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
