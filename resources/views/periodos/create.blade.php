@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
	<div class="header">
		<h4 class="title">Periodos</h4>
		<p class="category">Crear nuevo peridodo</p>
	</div>
	<div class="content">
		<form action="/periodos" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group ">
						<label>Nombre del periodo:</label>
						<input type="text" class="form-control" name="nombre" placeholder="Introducir nombre" required="required">	
					</div>
					<div class="form-group ">
						<label>Fecha de inicio:</label>
						<input type="date" class="form-control" name="fecha_inicio" placeholder="Introducir nombre" required="required">	
					</div>
					<div class="form-group ">
						<label>Fecha de finalización:</label>
						<input type="date" class="form-control" name="fecha_fin" placeholder="Introducir nombre" required="required">	
					</div>
					<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection