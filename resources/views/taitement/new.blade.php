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
                      <div class="well">
                        Sujet du ticket : {{ $ticket->message }}
                      </div>
                      <table class="table table-bordered table-stripped">
                        <tr>
                          <td>Description</td>
                          <td>Duree</td>
                          <td>Technicien</td>
                          <td></td>
                        </tr>
                        @foreach ($traitements as $traitement)
                          <tr>
                            <td>{{ $traitement->description }}</td>
                            <td>{{ $traitement->duree }} min</td>
                            <td>{{ $traitement->technicien->name }}</td>
                            <td></td>
                          </tr>
                        @endforeach

                      </table>
                      <br>
                      {!! Form::open(['method' => 'POST', 'url' => 'traitement/enregistrer', 'class' => 'form-horizontal']) !!}
                      {!! Form::hidden('ticket_id', $ticket->id) !!}
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    {!! Form::label('description', 'Description de l\'intervention ') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('duree') ? ' has-error' : '' }}">
                                    {!! Form::label('duree', 'Durée(Chiffres en minutes)') !!}
                                    {!! Form::text('duree', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('duree') }}</small>
                                </div>
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
