@props(['note' => null])

<a href=" {{ route('notes.show',  $note) }} " class="note__link">
	<p class="note__title">{{ $note->title }}</p>
	<!-- <p class="note__content">{{ $note->content }}</p> -->
	<p class="note__tag">{{ $note->tag->name }}</p>
	<p class="note__footer">{{ $note->created_at->diffForHumans() }}</p>
</a>