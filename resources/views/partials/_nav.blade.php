<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class="navbar-brand" href="/">Skripsi</a>
			<ul class="navbar-nav mr-auto">
				<li class="{{ Request::is('GetStarted') ? "active": "" }}"><a class="line-link" href="/GetStarted">Get Started<span class="sr-only">(current)</span></a></li>
				<li class="{{ Request::is('about') ? "active": "" }}"><a class="line-link" href="/About">About<span class="sr-only">(current)</span></a></li>
			</ul>
			<p class="my-2 my-lg-0">
				@if (Route::has('login'))
				<div class="top-right links">
					@auth
					<a class="home-button" href="{{ url('/admin') }}">Dashboard</a>
					@else
					@if (Request::is('login'))
					<a class="home-button" href="{{ route('home') }}">Register</a>
					@else
					<a class="home-button" href="{{ route('login') }}">Login</a>
					@endif
					@endauth
				</div>
				@endif

			</p>
		</div>
	</div>
</nav>