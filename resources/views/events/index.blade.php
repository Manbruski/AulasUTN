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
<script>
//inicializamos el calendario al cargar la pagina
$(document).ready(function() {
  $('#calendar').fullCalendar({
    lang: 'es',
    header: {
      left:   'title',
      center: '',
      right:  'today prev,next'


    },
    allDaySlot: false,
    slotEventOverlap: false,
    minTime: '08:00:00',
    maxTime: '21:30:00',

    events: [
    					{
    						title: 'All Day Event',
    						start: '2016-01-01'
    					},
    					{
    						title: 'Long Event',
    						start: '2016-01-07',
    						end: '2016-01-10'
    					},
    					{
    						id: 999,
    						title: 'Repeating Event',
    						start: '2016-01-09T16:00:00'
    					},
    					{
    						id: 999,
    						title: 'Repeating Event',
    						start: '2016-01-16T16:00:00'
    					},
    					{
    						title: 'Conference',
    						start: '2016-01-11',
    						end: '2016-01-13'
    					},
    					{
    						title: 'Meeting',
    						start: '2016-01-12T10:30:00',
    						end: '2016-01-12T12:30:00'
    					},
    					{
    						title: 'Lunch',
    						start: '2016-01-12T12:00:00'
    					},
    					{
    						title: 'Meeting',
    						start: '2016-01-12T14:30:00'
    					},
    					{
    						title: 'Happy Hour',
    						start: '2016-01-12T17:30:00'
    					},
    					{
    						title: 'Dinner',
    						start: '2016-01-12T20:00:00'
    					},
    					{
    						title: 'Birthday Party',
    						start: '2016-01-13T07:00:00'
    					},
    					{
    						title: 'Click for Google',
    						url: 'http://google.com/',
    						start: '2016-01-28'
    					}
    				]
,


    dayClick: function(date, jsEvent, view) {

            alert('Clicked on: ' + date.format());

            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

            // change the day's background color just for fun
            $(this).css('background-color', 'red');

        }

  })
  .fullCalendar('changeView', 'agendaWeek');
});
</script>
@endsection
