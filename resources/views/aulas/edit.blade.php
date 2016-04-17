@extends('layouts.app')

@section('content')
<div class="card col-md-8 col-md-offset-2">
	<div class="header">
		<h4 class="title">Aulas</h4>
		<p class="category">Crear nueva aula</p>
	</div>
	<div class="content">
        <form action="/aulas/{{$aula->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group ">
						<label>Código del aula:</label>
						<input type="text" class="form-control" name="codigo" placeholder="Introducir código" required="required" value="{{$aula->codigo}}">	
					</div>
					<div class="form-group ">
						<label class="checkbox ">Es aula
							<input type="checkbox" name="es_aula" data-toggle="checkbox" >
						</label>
					</div>
					<div class="form-group ">
						<label>Recinto:</label>
						<select name="recinto_id" class="form-control" required="required">
							@foreach($recintos as $recinto)
							@if($aula->recinto->id === $recinto->id)
							<option value="{{$recinto->id}}">{{$aula->recinto->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Descripción:</label>
						<input type="text" class="form-control" name="descripcion" placeholder="Descripción" required="required" value="{{$aula->descripcion}}">
					</div>
					<div class="form-group">
						<label>Observaciones:</label>
						<input type="text" class="form-control" name="observacion" placeholder="Observaciones" required="required" value="{{$aula->observacion}}">
					</div>
					<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection