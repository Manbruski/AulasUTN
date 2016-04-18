@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
	<div class="header">
		<h4 class="title">Recintos</h4>
		<p class="category">Crear nueva recinto</p>
	</div>
	<div class="content">
		<form action="/recintos/{{$recinto->id}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group ">
						<label>Nombre del recinto:</label>
						<input type="text" class="form-control" name="nombre" placeholder="Introducir código" required="required" value="{{$recinto->nombre}}">	
					</div>
					<div class="form-group ">
						<label>Dirección:</label>
						<input type="text" class="form-control" name="direccion" placeholder="Introducir código" required="required" value="{{$recinto->direccion}}">	
					</div>
					<div class="form-group ">
						<label>Horario:</label>
						<select name="horario_id" class="form-control" required="required">
							@foreach ($horarios as $horario)
							@if($horario->id === $recinto->horario_id)
							<option value="{{$recinto->horario_id}}" selected>{{$horario->nombre}}</option>
							@else
							<option value="{{$horario->id}}" >{{$horario->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
					<div class="form-group ">
						<label>Sede:</label>
						<select name="sede_id" class="form-control" required="required">
							@foreach ($sedes as $sede)
							@if($sede->id === $recinto->sede_id)
							<option value="{{$recinto->sede_id}}" selected>{{$sede->descripcion}}</option>
							@else
							<option value="{{$sede->id}}" >{{$sede->descripcion}}</option>
							@endif
							@endforeach
						</select>
					</div>

					<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection