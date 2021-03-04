@extends('layouts.main')

@section('title', 'Login')

@section('content')

<div class="container">

	<form class="form" action="{{ route('login.auth') }}" method="post">
		@csrf

		@if($errors->any())
			<div class="alert">{{$errors->first()}}</div>
		@endif

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" class="input" required title="Email Required" value="{{ old('email') }}" autocomplete="off" autofocus>

		<label for="email">PassWord: <small>min. 8 char</small></label>
		<input type="password" name="password" id="password" class="input" required minlength="8" maxlength="16" title="Password Required" autocomplete="off">

		<input type="submit" class="submit submit-form" value="Sign In">
	</form>

</div>

@endsection