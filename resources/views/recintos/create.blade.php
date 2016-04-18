@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
	<div class="header">
		<h4 class="title">Recinto</h4>
		<p class="category">Crear nuevo recinto:</p>
	</div>
	<div class="content">
		<form action="/recintos" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group">
						<label>Nombre del recinto:</label>
						<input type="text" class="form-control" name="nombre" placeholder="Introducir nombre" required="required">
					</div>
					<div class="form-group">
						<label>Dirección:</label>
						<input type="text" class="form-control" name="direccion" placeholder="Introducir nombre" required="required">
					</div>
					<div class="form-group ">
						<label>Horario:</label>
						<select name="horario_id" class="form-control" required="required">
							@foreach($horarios as $horario)
							<option value="{{$horario->id}}">{{$horario->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group ">
						<label>Sede:</label>
						<select name="sede_id" class="form-control" required="required">
							@foreach($sedes as $sede)
							<option value="{{$sede->id}}">{{$sede->descripcion}}</option>
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