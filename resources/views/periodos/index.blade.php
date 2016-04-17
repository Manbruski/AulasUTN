@extends('layouts.app')
@section('content')
<div class="card">
  <div class="header">
    <a href="/periodos/create">
      <button class="btn btn-info btn-fill pull-right">Nuevo Periodo</button>
    </a>
    <h4 class="title">Periodos</h4>
    <p class="category">Mantenimiento de Periodos</p>
  </div>
  <div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
      <thead>
        <th>Nombre</th>
        <th>Hora de inicio</th>
        <th>Hora de finalización</th>
        <th>Acciones</th>
      </thead>
      <tbody>
       @foreach ($periodos as $periodo)
       <tr>
        <td>{{$periodo->nombre}}</td>                
        <td>{{$periodo->fecha_inicio}}</td>                
        <td>{{$periodo->fecha_fin}}</td>                
        <td class="fixed col-sm-2">
          <a href='/periodos/{{$periodo->id}}/edit' class="btn btn-warning btn-xs col-sm-2" href="edit.html">
            <i class="pe-7s-pen"></i></a>
            <form action="/periodos/{{$periodo->id}}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger btn-xs">
                <i class="pe-7s-trash"></i>

              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="footer text-center">
    <hr>
    {{$periodos->links()}}
  </div>
</div> 

@endsection