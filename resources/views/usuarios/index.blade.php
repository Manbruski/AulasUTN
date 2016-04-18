@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/register">
            <button class="btn btn-info btn-fill pull-right">Nuevo Usuario</button>
        </a>
        <h4 class="title">Usuarios</h4>
        <p class="category">Mantenimiento de usuarios</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Nombre</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Es docente</th>
                <th>Activo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
             @foreach ($usuarios as $usuario)
             <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->celular}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->perfil->nombre}}</td>
                <td>
                <div class="checkbox {{ $usuario->es_docente == 1 ? 'checked' : '' }}">
                <input type="checkbox" name="es_docente" data-toggle="checkbox" value="{{$usuario->es_docente}}" disabled/>
                    </div>
                </td>
                <td>
                <div class="checkbox {{ $usuario->activo == 1 ? 'checked' : '' }}">
                <input type="checkbox" name="activo" data-toggle="checkbox" value="{{$usuario->activo}}" disabled/>
                    </div>
                </td>
                

                <td class="fixed col-sm-2">
                    <a href='/usuarios/{{$usuario->id}}/edit' class="btn btn-warning btn-xs col-sm-4" href="edit.html">Editar</a>
                    <form action="/usuarios/{{$usuario->id}}" method="POST">
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
    {{$usuarios->links()}}
</div>
@endsection
