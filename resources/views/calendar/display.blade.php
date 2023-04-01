@extends('layouts.app') 
@section('content') 

<div id="calendar"></div> 
<script type="module">
import { Calendar } from './@fullcalendar/core';
import dayGridPlugin from './@fullcalendar/daygrid';
import timeGridPlugin from './@fullcalendar/timegrid';
import listPlugin from './@fullcalendar/list';
</script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
          
        });
        calendar.render();
      });
   
    </script>


</script> 
@endsection 