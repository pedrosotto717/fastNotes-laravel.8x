@props(['notes' => []])


<ul class="note">

	@foreach($notes as $note)
	<li class="note__item">
		<x-note-card :note='$note' />
	</li>
	@endforeach

</ul>
