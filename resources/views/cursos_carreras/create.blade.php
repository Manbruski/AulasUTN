@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Crear relacion Curso-Carrera:</div>
        <form action="/cursos_carreras" method="POST" class="form-horizontal" role="form">
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label col-sm-3" for="curso_id">Curso:</label>
              <div class="col-sm-9">
                <select name="curso_id" class="form-control" required="required">
                  @foreach ($cursos as $curso)
                  <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="carrera_id">Carrera:</label>
              <div class="col-sm-9">
                <select name="carrera_id" class="form-control" required="required">
                  @foreach ($carreras as $carrera)
                  <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <button type="submit" class="btn pull-right">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
