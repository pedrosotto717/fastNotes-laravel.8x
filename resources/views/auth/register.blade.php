@extends('layouts.main')

@section('title', 'Register')

@section('content')

<div class="container">

	<form class="form form-register" action="{{ route('register.store') }}" method="post">
		@csrf

		@if($errors->any())
			<div class="alert">{{$errors->first()}}</div>
		@endif

		<label for="name">Name:</label>
		<input type="text" name="name" id="name" class="input" required pattern="[^0-9^\*]{0,15}" title="Only Words and max. 15 chars" autocomplete="off" autofocus>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" class="input" required autocomplete="off">

		<label for="password">PassWord: <small>min. 8 char</small></label>
		<input type="password" name="password" id="password" class="input" required minlength="8" maxlength="16" autocomplete="off">

		<label for="password_confirmation">Confirm Password: <small>min. 8 char</small></label>
		<input type="password" name="password_confirmation" id="password_confirmation" class="input" required minlength="8" maxlength="16" autocomplete="off">

		<input type="submit" class="submit submit-form" value="Sign Up">
	</form>

</div>

@endsection