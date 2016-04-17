@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fullcalendar.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fullcalendar.print.css')}}" media="print">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
@endsection

@section('content')
  <div class="header">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="sedes">Seleccione una sede</label>
          <select id="sedes" class="form-control">
            @foreach ($sedes as $sede)
              <option value="{{ $sede->id }}">{{ $sede->descripcion }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="aulas">Seleccione un aula</label>
          <select id="aulas" class="form-control">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="recintos">Seleccione un recinto</label>
          <select id="recintos" class="form-control">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="periodos">Seleccione un periodo</label>
          <select id="peridos" class="form-control">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
        </div>
      </div>
    </div>
  </div>


  <hr>
  <div class="content">
    <div id="calendar"></div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/fullcalendar.js')}}"></script>
  <script src="{{asset('assets/js/lang-all.js')}}"></script>
  <script src="{{asset('assets/js/reservaciones.js')}}"></script>
@endsection
