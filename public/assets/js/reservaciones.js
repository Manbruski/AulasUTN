$(document).ready(function() {
  initCalendar();
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
      slotEventOverlap: false,
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


      // selectable: true,
      // selectHelper: true,

      // select: function(start, end, allDay) {
      //   var title = prompt("Ingrese un título para la reservación", '');
      // 	if (title) {
      // 		calendar.fullCalendar('renderEvent',
      // 			{
      // 				title: title,
      // 				start: start,
      // 				end: end,
      // 				allDay: allDay
      // 			},
      // 			true // make the event "stick"
      // 		);
      // 	}
      // 	calendar.fullCalendar('unselect');
      // },


      dayClick: function(date, jsEvent, view) {
        var descripcion = prompt("Ingrese una descripción corta para la reservación", '');
        if (descripcion !== null && descripcion !== '') {
          view.calendar.renderEvent({
            title: descripcion,
            start: date.format() // will be parsed
          });
        }
      }
    });
  }
