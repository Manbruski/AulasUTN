@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/aulas/create">
            <button class="btn btn-info btn-fill pull-right">Nueva Aula</button>
        </a>
        <h4 class="title">Aulas</h4>
        <p class="category">Mantenimiento de aulas</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Codigo</th>
                <th>Es aula</th>
                <th>Recinto</th>
                <th>Descripcion</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </thead>
                <tbody>                
               @foreach ($aulas as $aula)
               <tr>
                <td>{{$aula->codigo}}</td>
                <td>{{$aula->es_aula}}</td>
                
                <td>{{$aula->recinto->nombre}}</td>
                
                <td>{{$aula->descripcion}}</td>
                <td>{{$aula->observacion}}</td>
                <td class="fixed col-sm-2">
                <a href='/aulas/{{$aula->id}}/edit' class="btn btn-warning btn-xs col-sm-4" href="edit.html">Editar</a>
                    <form action="/aulas/{{$aula->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<div class="text-right">
    {{$aulas->links()}}
</div>
@endsection