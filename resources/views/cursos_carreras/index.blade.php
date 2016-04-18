@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/cursos_carreras/create">
            <button class="btn btn-info btn-fill pull-right">Nuevo Curso</button>
        </a>
        <h4 class="title">Cursos Carreras</h4>
        <p class="category">Mantenimiento de Cursos-Carreras</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Nombre de curso</th>
                <th>Nombre de carrera</th>
                <td>Acciones</td>
            </thead>
            @foreach ($cursos_carreras as $curso_carrera)
            <tr>
            <tbody>
                <td>{{$curso_carrera->curso}}</td>
                <td>{{$curso_carrera->carrera}}</td>
                <td class="fixed col-sm-2">
                <a href='/cursos_carreras/{{$curso_carrera->id}}/edit' class="btn btn-warning btn-xs col-sm-4" href="edit.html">Editar</a>
                    <form action="/cursos_carreras/{{$curso_carrera->id}}" method="POST">
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
    {{$cursos_carreras->links()}}
</div>
@endsection