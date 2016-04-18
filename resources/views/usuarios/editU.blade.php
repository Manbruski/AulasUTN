@extends('layouts.app')
@section('content')

<div class="card col-md-8 col-md-offset-2">
  <div class="header">
    <h4 class="title">Usuario</h4>
    <p class="category">actualizar Información</p>
  </div>
  <div class="content">
    <form action="/usuarios/{{$usuario->id}}" method="POST">
       <input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="form-group ">
            <label>Nombre :</label>
            <input type="text" class="form-control" name="name" placeholder="Introducir nombre" required="required"  value="{{$usuario->name}}">
          </div>
          <div class="form-group">
            <label>Celular:</label>
            <input type="text" class="form-control" name="celular" placeholder="Numero" required="required"  value="{{$usuario->celular}}">
          </div>

          <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
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
