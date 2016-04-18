@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Curso-Carrera</h4>
    <p class="category">Crear nuevo Curso-Carrera</p>
  </div>
  <div class="content">
    <form action="/asignaciones" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="form-group ">
            <label>Profesor:</label>
            <select name="usuario_id" class="form-control" required="required">
            @foreach($profesores as $prof)
              <option value="{{$prof->id}}">{{$prof->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group ">
            <label>Carrera:</label>
            <select name="curso_carrera_id" class="form-control" required="required">
            @foreach($curso_carreras as $curso)
              <option value="{{$curso->id}}">{{$curso->curso}} - {{$curso->carrera}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
