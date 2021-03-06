<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
			<div class="fluid-navbar">
				<div class="container nav-bar">
					<span class="name-user-app">
						@auth
								{{Auth::user()->name ?? Guest}}
						@endauth
					</span>
					<nav class="menu">
						<ul class="menu__list">
							@guest
								<li class="menu__item">
									<a class="menu__link {{Route::is('login.index') ? 'active' : ''}}" href="{{route('login.index')}}">Login</a>
								</li>
								<li class="menu__item">
									<a class="menu__link {{Route::is('register.index') ? 'active' : ''}}" href="{{route('register.index')}}">Register</a>
								</li>
							@else
								@if(!Route::is('home'))
									<li class="menu__item">
										<a class="menu__link" href="{{route('home')}}">Home</a>
									</li>
								@endif
								<li class="menu__item">
									<a class="menu__link" href="{{route('logout')}}">Logout</a>
								</li>
							@endguest
						</ul>
					</nav>
				</div>
			</div>
	<div id="app">
		@yield('content')
	</div>

	<script src="{{asset('js/app.js')}}" type="module"></script>
</body>
</html>