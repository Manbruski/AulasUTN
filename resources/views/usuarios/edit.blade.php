@extends('layouts.app')
@section('content')

<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Profesor</h4>
    <p class="category">Crear nuevo profesor</p>
  </div>
  <div class="content">
    <form action="/usuarios/{{$usuario->id}}" method="POST">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="form-group ">
            <label>Nombre del profesor:</label>
            <input type="text" class="form-control" name="name" placeholder="Introducir nombre" required="required" value="{{$usuario->name}}">
          </div>
          <div class="form-group">
            <label>Numero:</label>
            <input type="number" class="form-control" name="celular" placeholder="Numero" required="required" value="{{$usuario->celular}}">
          </div>
          <div class="form-group ">
            <label>Perfil:</label>
            <select name="perfil_id" class="form-control">
              @foreach ($perfiles as $perfil)
              @if($perfil->id === $usuario->perfil_id)
              <option value="{{$perfil->perfil_id}}" selected>{{$perfil->nombre}}</option>
              @else
              <option value="{{$perfil->id}}" >{{$perfil->nombre}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="{{$usuario->email}}">
          </div>
          <div class="form-group">
            <label class="checkbox {{ $usuario->es_docente == 1 ? 'checked' : '' }}">Es Docente
              <input type="checkbox" name="es_docente" data-toggle="checkbox">
            </label>
          </div>

          <div class="form-group ">
            <label class="checkbox {{ $usuario->activo == 1 ? 'checked' : '' }}">Activo
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
@section('scripts')
@if (count($errors) > 0)
<script src="/assets/js/notification.js"></script>
@endif
@endsection

