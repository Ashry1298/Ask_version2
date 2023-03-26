<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
</head>
<body>
<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				@auth
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#">Nav1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#">Nav2</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Nav3</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Nav4</a>
						</li>
					

						<li class="nav-item">
							@yield("email")
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
						</li>
					</ul>
					@endauth
				</div>
			</div>
		</nav>
		<div class="container py-5">

			@yield('content')
		</div>



<script src="{{asset('js/bootstrap.js')}}" ></script>
<script src="{{asset('js/jquery-3.5.1.js')}}" ></script>
</body>
</html>