@extends('frontend.layouts.base')
@section('main-container')

	<div class="container-fluid" style="min-height: 500px;">
		<div class="container">
		<div class="bg-warning-subtle rounded" style="max-width: 500px; margin:auto;">
				<h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">Login Page</h1>
			</div>
			<form class="form-group p-3 bg-warning-subtle" style="max-width: 500px; margin: auto;" method="post" action="{{url('/')}}/login">
			    @csrf
				<x-inputform type="text" name="username" label="Username :"/>
				<span class="text-danger">
					@error('username')
						{{$message}}.<br>
					@enderror
				</span>
				<x-inputform type="password" name="password" label="Password :"/>
				<span class="text-danger">
					@error('password')
						{{$message}}.<br>
					@enderror
				</span>
				<input type="submit" name="submit" value="login" class="m-3 btn btn-primary text-uppercase" style="width: 10vw;">
			</form>
		</div>
	</div>
@endsection
