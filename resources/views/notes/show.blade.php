@extends('layouts/main')

@section('title', 'Show')

@section('content')
	<div class="container show-note">
		<h2>{{$note->title}}</h2>
		<p class="note__tag">
			{{$note->tag->name}}
		</p>
		<p>
			{{$note->content}}
		</p>
		<br>
		<a href="{{ route('notes.edit', $note) }}" class="menu__link btn">Edit</a>

		<button id="destroy_note"
						data-url="{{ route('notes.destroy', $note) }}"
						data-method="DELETE"
						data-token="{{ csrf_token() }}"
						class="menu__link btn" >
			Delete
		</button>

	</div>
    <a href="{{ route('notes.create') }}" title="add Note" class="add-note">+</a>

@endsection