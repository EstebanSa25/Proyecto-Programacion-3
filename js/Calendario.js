//Get the collection of events
//$('#calendar').fullCalendar('clientEvents')

$(function() {

    $('#calendar').fullCalendar({
      themeSystem: 'jquery-ui',
      navLinks: true,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      weekNumbers: true,
      eventLimit: true, // allow "more" link when too many events
      eventSources: [
        {url: 'https://fullcalendar.io/demo-events.json'}
      ],
      eventRender: function(event, element, view) {
         var theDate = event.start
          var endDate = event.dowend;
                  var startDate = event.dowstart;
          
          if (theDate >= endDate) {
                  return false;
          }
  
          if (theDate <= startDate) {
            return false;
          }      
      },
      events: [
        {
          id: 1,
          title:"Lunch",
          start:'12:00', 
          end:  '12:30', 
          dow: [1, 2, 3, 4, 5],
          dowstart: moment('2018-04-01', 'YYYY-MM-DD'),
          dowend: moment('2018-05-01', 'YYYY-MM-DD'),
          className: 'fc-event-lunch'
        }
      ],
      businessHours: [{
        dow: [1,2,3,4,5],
        start: '08:00',
        end: '16:30'
      }],
      minTime: '06:00',
      maxTime: '21:00'
    });
  
  });