@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
	<div class="header">
		<h4 class="title">Aulas</h4>
		<p class="category">Crear nueva aula</p>
	</div>
	<div class="content">
		<form action="/aulas" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group ">
						<label>Código del aula:</label>
						<input type="text" class="form-control" name="codigo" placeholder="Introducir código" required="required">	
					</div>
					<div class="form-group ">
						<label>Es aula:</label>
						<input type="checkbox" class="form-control" name="es_aula" required="required">	
					</div>
					<div class="form-group ">
						<label>Recinto:</label>
						<select name="recinto_id" class="form-control" required="required">
							@foreach($recintos as $recinto)
							<option value="{{$recinto->id}}">{{$recinto->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Descripción:</label>
						<input type="text" class="form-control" name="descripcion" placeholder="Descripción" required="required">
					</div>
					<div class="form-group">
						<label>Observaciones:</label>
						<input type="text" class="form-control" name="observacion" placeholder="Observaciones" required="required">
					</div>
					<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection