@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Carreras</div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($carreras as $carrera)
                            <tr>
                                <td>{{$carrera->nombre}}</td>
                                <td>{{$carrera->codigo}}</td>

                                <td>
                                    <a href='/carreras/{{$carrera->id}}/edit'><button class="btn btn-primary" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                    </a>
                                    <form action="/carreras/{{$carrera->id}}" method="POST">
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
                <div class="text-center">
                {{$carreras->links()}}
                </div>
                <h4><a href="/carreras/create">Nueva Carrera</a></h4>
            </div>
        </div>
    </div>
@endsection