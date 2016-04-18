@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Asociación de cursos y carreras</div>
                <table class="table table-bordered">
                    <tr>
                        <th>Nombre de curso</th>
                        <th>Nombre de carrera</th>
                        <td>Acciones</td>
                    </tr>
                    @foreach ($cursos_carreras as $curso_carrera)
                    <tr>
                    <td>@foreach ($cursos as $curso)
                            @if($curso->id === $curso_carrera->curso_id)
                            {{$curso->nombre}}
                            @endif
                            @endforeach
                        </td>
                        <td>@foreach ($carreras as $carrera)
                            @if($carrera->id === $curso_carrera->carrera_id)
                            {{$carrera->nombre}}
                            @endif
                            @endforeach
                        </td>
                        <td>                                  
                            <a href='/cursos_carreras/{{$curso_carrera->id}}/edit'><button class="btn btn-primary" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                            </a>
                            <form action="/cursos_carreras/{{$curso_carrera->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                    @endforeach
                </table>               
            </div>
            <h4><a href="/cursos_carreras/create">Nueva asociación</a></h4>
        </div>
    </div>
</div>
@endsection