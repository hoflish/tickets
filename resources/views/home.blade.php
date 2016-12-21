@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Système de Gestion de Tickets</div>
                <div class="panel-body">
                   @if(Auth::user()->role=='admin')
                     @include('ticket.admin')
                   @else
                      @include('ticket.user')
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
