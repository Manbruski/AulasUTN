@extends('layouts.app')

@section('content')
<div class="card">
    <div class="header">
        <h4 class="title">Curso</h4>
        <p class="category">Editar curso</p>
    </div>
    <div class="content">
        <form action="/cursos/{{$curso->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre del curso:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Introducir nombre" value="{{$curso->nombre}}" required="required">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" class="form-control" name="codigo" placeholder="codigo" value="{{$curso->codigo}}" required="required">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
        <div class="clearfix"></div>    
    </form>
</div>
</div>
@endsection