@extends('layouts.acara')

@section('content')
<div class="container"> 
	<div id="calendar" ></div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

	// var posting = 
	$.post( '{{route("jadwalajax")}}',function( data ) {
	  alert( "Data Loaded: " + data );
	});
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		defaultDate: '2017-05-12',
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: posting
	});
		
});

</script>
@endsection