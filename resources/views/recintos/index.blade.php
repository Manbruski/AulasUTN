@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/recintos/create">
            <button class="btn btn-info btn-fill pull-right">Nueva recinto</button>
        </a>
        <h4 class="title">Recintos</h4>
        <p class="category">Mantenimiento de Recintos</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>                
                <th>Nombre de recinto</th>
                <th>Dirección</th>
                <th>Horario</th>
                <th>Sede</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($recintos as $recinto)
                <tr>
                    <td>{{$recinto->nombre}}</td>
                    <td>{{$recinto->direccion}}</td>
                    <td>{{$recinto->horario}}</td>
                    <td>{{$recinto->sede}}</td>
                    <td class="fixed col-sm-2">
                        <a href='/recintos/{{$recinto->id}}/edit' class="btn btn-warning btn-xs col-sm-3" href="edit.html">
                            <i class="pe-7s-pen"></i></a>
                            <form action="/recintos/{{$recinto->id}}" method="POST">
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
            {{$recintos->links()}}
        </div>
    </div> 

    @endsection