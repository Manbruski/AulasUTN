@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Asignación</h4>
    <p class="category">Editar Asignación</p>
  </div>
  <div class="content">
    <form action="/asignaciones/{{$uccarrera->id}}" method="POST">
       <input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="form-group ">
            <label>Profesor:</label>
            <select name="usuario_id" class="form-control" required="required">
            @foreach($profesores as $prof)
              @if($prof->id === $uccarrera->usuario_id)
                <option value="{{$uccarrera->usuario_id}}" selected>{{$prof->name}}</option>
              @else
                <option value="{{$prof->id}}" >{{$prof->name}}</option>
              @endif
            @endforeach
            </select>
          </div>
          <div class="form-group ">
            <label>Carrera:</label>
            <select name="curso_carrera_id" class="form-control" required="required">
              @foreach($curso_carreras as $curso)
                @if($curso->id === $uccarrera->curso_carrera_id)
                  <option value="{{$curso->id}}" selected>{{$curso->carrera}} - {{$curso->curso}}</option>
                @else
                  <option value="{{$curso->id}}" >{{$curso->carrera}} - {{$curso->curso}}</option>
                @endif
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
