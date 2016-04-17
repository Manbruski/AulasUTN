$(document).ready(function() {
  initCalendar();

  $('#sedes').change(function(e){


    // var text = $("#sedes :selected").text();
    // $('#recintos').remove();
    // $('#aulas').remove();

    var sedeId = $("#sedes").val();
    $.getJSON( "recintos", {sede: sedeId })
    .done(function(recintos) {
      console.log( "second success" );
    }).fail(function(error) {
      console.log( "error" );
    });

  });
});

function initCalendar(){
  $('#calendar').fullCalendar(
    {
      lang: 'es',
      header: {
        left:   'title',
        center: '',
        right:  'today prev,next'
      },
      allDaySlot: false,
      eventOverlap: false,
      defaultView: 'agendaWeek',
      editable: true,


      minTime: '08:00:00',
      maxTime: '21:30:00',
      events: [
        {
          id: 999,
          title: 'Repeating Event',
          start: '2016-04-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2016-04-16T16:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2016-04-28'
        }
      ],


      defaultTimedEventDuration: '00:30:00',
      dayClick: function(date, jsEvent, view) {
        var descripcion = prompt("Ingrese una descripción corta para la reservación", '');
        if (descripcion) {
          view.calendar.renderEvent({
            title: descripcion,
            start: date.format(),
          });
        }
      },
      eventResize: function(event, delta, revertFunc) {
        console.log(event.title + " end is now " + event.end.format());
      },
      eventDrop: function(event, delta, revertFunc) {
        console.log(event.title + " was dropped on " + event.start.format());
      }
    });
  }
