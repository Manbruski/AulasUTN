@extends('layouts.app')
@section('content')
<div class="card">
    <div class="header">
        <a href="/perfiles/create">
            <button class="btn btn-info btn-fill pull-right">Nuevo Perfil</button>
        </a>
        <h4 class="title">Perfiles</h4>
        <p class="category">Mantenimiento de perfiles</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Nombre</th>

                <th>Acciones</th>
            </thead>
            <tbody>
             @foreach ($perfiles as $perfil)
             <tr>
                <td>{{$perfil->nombre}}</td>                
                <td class="fixed col-sm-2">
                    <a href='/perfiles/{{$perfil->id}}/edit' class="btn btn-warning btn-xs col-sm-2" href="edit.html">
                    <i class="pe-7s-pen"></i></a>
                    <form action="/perfiles/{{$perfil->id}}" method="POST">
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
    {{$perfiles->links()}}
</div>
</div> 

@endsection