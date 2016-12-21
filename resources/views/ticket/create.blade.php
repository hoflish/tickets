@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Création de nouveau ticket</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      {!! Form::open(['method' => 'POST', 'url' => 'ticket/enregistrer', 'class' => 'form-horizontal']) !!}
                          <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                              {!! Form::label('message', 'Votre message :') !!}
                              {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('message') }}</small>
                          </div>
                          <div class="form-group{{ $errors->has('priorite_id') ? ' has-error' : '' }}">
                              {!! Form::label('priorite_id', 'Input label') !!}
                              {!! Form::select('priorite_id', $priorites, null, ['class' => 'form-control', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('priorite_id') }}</small>
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
