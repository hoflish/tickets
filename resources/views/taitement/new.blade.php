@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Traitement du ticket N° {{ $ticket->id}} crée par {{ $ticket->user->name}}, le {{ $ticket->created_at}}</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      {!! Form::open(['method' => 'POST', 'url' => 'traitement/enregistrer', 'class' => 'form-horizontal']) !!}

                          <div class="btn-group pull-right">
                              {!! Form::reset("Annuler", ['class' => 'btn btn-warning']) !!}
                              {!! Form::submit("Enregistrer", ['class' => 'btn btn-success']) !!}
                          </div>
                      {!! Form::close() !!}
                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
