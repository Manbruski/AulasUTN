@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/asignacines/create">
            <button class="btn btn-info btn-fill pull-right">Nuevo asignacion</button>
        </a>
        <h4 class="title">asignacines</h4>
        <p class="category">Mantenimiento de asignacines</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Profe</th>
                <th>Asignacion</th>
                <th>Acciones</th>
            </thead>
            <tbody>
             @foreach ($asignaciones as $asignacion)
             <tr>
                <td>{{$asignacion->usuario}}</td>                
                <td>{{$asignacion->curso}} - {{$asignacion->carrera}}</td>                
                <td class="fixed col-sm-2">
                    <a href='/asignaciones/{{$asignacion->id}}/edit' class="btn btn-warning btn-xs col-sm-2" href="edit.html">
                    <i class="pe-7s-pen"></i></a>
                    <form action="/asignaciones/{{$asignacion->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs">
                            <i class="pe-7s-trash"></i>
                            
                      </button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
<div class="footer text-center">
    <hr>
    {{$asignaciones->links()}}
</div>
</div> 

@endsection