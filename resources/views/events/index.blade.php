@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fullcalendar.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fullcalendar.print.css')}}" media="print">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
@endsection

@section('content')
  <br>
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div id="calendar"></div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/fullcalendar.js')}}"></script>
<script src="{{asset('assets/js/lang-all.js')}}"></script>
<script src="{{asset('assets/js/reservaciones.js')}}"></script>
@endsection
