@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Curso-Carrera</h4>
    <p class="category">Crear nuevo Curso-Carrera</p>
  </div>
  <div class="content">
    <form action="/cursos_carreras/{{$cursos_carreras->id}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group ">
          <label>Curso:</label>
          <select name="curso_id" class="form-control" required="required">
                  @foreach ($cursos as $curso)
                  @if($curso->id === $cursos_carreras->curso_id)
                  <option value="{{$cursos_carreras->curso_id}}" selected>{{$curso->nombre}}</option>
                  @else
                  <option value="{{$curso->id}}" >{{$curso->nombre}}</option>
                  @endif
                  @endforeach
          </select>
        </div>
        <div class="form-group ">
          <label>Carrera:</label>
          <select name="carrera_id" class="form-control" required="required">
            @foreach ($carreras as $carrera)
                  @if($carrera->id === $cursos_carreras->carrera_id)
                  <option value="{{$cursos_carreras->carrera_id}}" selected>{{$carrera->nombre}}</option>
                  @else
                  <option value="{{$carrera->id}}" >{{$carrera->nombre}}</option>
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
