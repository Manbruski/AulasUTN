@extends('layouts.app')
@section('content')

@if (Session::has('email'))
<div id="error">{{$errors->email}}</div>
@endif

<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Profesor</h4>
    <p class="category">Crear nuevo profesor</p>
  </div>
  <div class="content">
    <form action="{{ url('/register') }}" method="POST">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="form-group ">
            <label>Nombre del profesor:</label>
            <input type="text" class="form-control" name="name" placeholder="Introducir nombre" required="required">
          </div>
          <div class="form-group">
            <label>Numero:</label>
            <input type="number" class="form-control" name="celular" placeholder="Numero" required="required">
          </div>
          <div class="form-group ">
            <select name="perfil_id" class="form-control">
              @foreach($perfiles as $perfil)
              <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          </div>
          <div class="form-group">
            <label class="checkbox ">Es Docente
              <input type="checkbox" name="es_docente" data-toggle="checkbox">
            </label>
          </div>

          <div class="form-group ">
            <label class="checkbox ">Activo
              <input type="checkbox" name="activo" data-toggle="checkbox">
            </label>
          </div>
          <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
