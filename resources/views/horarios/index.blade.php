@extends('layouts.app')
@section('content')
<div class="card col-sm-10 col-md-offset-1">
  <div class="header">
    <h4 class="title">Horarios</h4>
    <p class="category">Vista de horarios</p>
  </div>
  <div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
      <thead>
        <th>Nombre</th>
        <th>Hora de inicio</th>
        <th>Hora de finalización</th>
      </thead>
      <tbody>
       @foreach ($horarios as $horario)
       <tr>
        <td>{{$horario->nombre}}</td>
        <td>{{$horario->hora_inicio}}</td>
        <td>{{$horario->hora_fin}}</td>                
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div> 
@endsection