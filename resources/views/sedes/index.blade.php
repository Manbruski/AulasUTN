@extends('layouts.app')
@section('content')
<div class="card col-sm-10 col-md-offset-1">
    <div class="header">
        <a href="/sedes/create">
            <button class="btn btn-info btn-fill pull-right">Nueva Sede</button>
        </a>
        <h4 class="title">Sedes</h4>
        <p class="category">Mantenimiento de sedes</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Descripción</th>
                <th>Acciones</th>
            </thead>
            <tbody>
             @foreach ($sedes as $sede)
             <tr>
                <td>{{$sede->descripcion}}</td>                
                <td class="fixed col-sm-2">
                    <a href='/sedes/{{$sede->id}}/edit' class="btn btn-warning btn-xs col-sm-3" href="edit.html">
                    <i class="pe-7s-pen"></i></a>
                    <form action="/sedes/{{$sede->id}}" method="POST">
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
    {{$sedes->links()}}
</div>
</div> 

@endsection