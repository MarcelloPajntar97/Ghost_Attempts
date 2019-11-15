@if (strpos($warn, 'not found'))
	<h2>Opss.... Qualcosa deve essere andato storto</h2><br>
	<span>{{ $warn }}</span>
@elseif ($err != "")
	<h2>Opss.... Qualcosa deve essere andato storto</h2><br>
	<span>{{ $err }}</span>
@else
	<h2>CONNESSOOOOO</h2>
@endif