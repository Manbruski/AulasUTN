@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
    <div class="header">
        <h4 class="title">Carrera</h4>
        <p class="category">Editar carrera</p>
    </div>
    <div class="content">
        <form action="/carreras/{{$carrera->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <label>Nombre de la carrera:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Introducir nombre" value="{{$carrera->nombre}}" required="required">
                </div>
                
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" class="form-control" name="codigo" placeholder="codigo" value="{{$carrera->codigo}}" required="required">
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                <div class="clearfix"></div> 
            </div>
        </div>
    </form>
</div>
</div>
@endsection