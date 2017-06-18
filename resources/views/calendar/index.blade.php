@extends('layouts.acara')

@section('content')
<div class="container"> 
	<div id="calendar" ></div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

	
	$.post( '{{route("jadwalajax")}}',function( data ) {
	  	$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: data,
			eventClick: function(calEvent, jsEvent, view) {
		        alert('Event: ' + calEvent.title);
		        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        alert('View: ' + view.name);

		        // change the border color just for fun
		        $(this).css('border-color', 'red');
		    }
		});
	});

	// console.log($posting);
	
	
		
});

</script>
@endsection