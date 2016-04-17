@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
    <div class="header">
        <h4 class="title">Perfiles</h4>
        <p class="category">Editar perfil</p>
    </div>
    <div class="content">
        <form action="/perfiles/{{$perfil->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <label>Nombre del perfil:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Introducir nombre" value="{{$perfil->nombre}}" required="required">
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                <div class="clearfix"></div>    
            </div>
        </div>
    </form>
</div>
</div>
@endsection