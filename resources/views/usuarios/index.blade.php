@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/usuarios/create">
            <button class="btn btn-info btn-fill pull-right">Nuevo Usuario</button>
        </a>
        <h4 class="title">Usuarios</h4>
        <p class="category">Mantenimiento de usuarios</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Acciones</th>
            </thead>
                <tbody>
               @foreach ($cursos as $curso)
               <tr>
                <td>{{$curso->nombre}}</td>
                <td>{{$curso->codigo}}</td>
                <td class="fixed col-sm-2">
                <a href='/cursos/{{$curso->id}}/edit' class="btn btn-warning btn-xs col-sm-4" href="edit.html">Editar</a>
                    <form action="/cursos/{{$curso->id}}" method="POST">
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
    {{$cursos->links()}}
</div>
@endsection
