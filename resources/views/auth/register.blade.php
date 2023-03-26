@extends('layout')
@section('title')
    Registration page
@endsection


@section("content")
@include('inc/errors')
<form action="{{route('auth.handleregister')}}" method="post"  class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
	<h1 class="text-center pb-5 display-4 fs-3">
		Register
	</h1>
	<div class="mb-3">
		<label class="form-label">
			Name
		</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="mb-3">
		<label class="form-label">
			User Name
		</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="mb-3">
		<label class="form-label">
			Email
		</label>
		<input type="email" class="form-control"  name="email">
	</div>
	<div class="mb-3">
		<label class="form-label">
			password
		</label>
		<input type="password" class="form-control"  name="password">
	</div>

	<button type="submit" class="btn btn-primary">
		submit</button>
</form>
</div>

@endsection