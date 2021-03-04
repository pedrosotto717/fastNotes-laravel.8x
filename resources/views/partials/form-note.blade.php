
<div class="form-notes__container">
	<form class="form-notes"
				action="{{ Route::is('notes.edit')
				? route('notes.update', $note)
				: route('notes.store') }}" method="post">
		@csrf

		@isset($method)
			@method($method)
		@endisset

		@if($errors->any())
			<div class="alert">
				{{$errors->first()}}
			</div>
		@endif

		<input type="text" name="title" id="title" class="input" value="{{$note->title ?? ''}}" maxlength="50" placeholder="Title" title="max. 50 chars" autocomplete="off">

		<textarea name="content" rows="10" cols="70" autocomplete="off">{{$note->content ?? ''}}</textarea>

		<select class="options" name="tag_id">

			@foreach($tags as $tag)
				<option {{ $note->tag_id ?? '' == $tag->id ? 'selected' : ''}}
				value="{{$tag->id}}">{{$tag->name}}</option>
			@endforeach

		</select>

		<input type="submit"
					 class="submit btn submit-form"
					 value="{{ $submit_btn ?? 'Create'}}">
	</form>

</div>

