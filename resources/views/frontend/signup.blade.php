@extends('frontend.layouts.base')
@section('main-container')

	<div class="container-fluid">
		<div class="container">
			<div class="bg-warning-subtle" style="max-width: 500px; margin:auto;">
				<h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">New Entry</h1>
			</div>
			<form class="form-group p-3 mb-4 bg-warning-subtle" style="max-width: 500px; margin: auto;" method="post" action="/register">
			    @csrf
				<x-inputform label="Name :" name="name" type="text" />
                <span class="text-danger">
					@error('username')
						{{$message}}.<br>
					@enderror
				</span>

                <div class="mb-3">
                    <label for="" class="form-label">Gender</label>
                    <select class="form-select form-select-lg" name="gender" id="">
                        <option disabled selected>Select one</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>

				<x-inputform label="Username :" name="username" type="text" />
                <span class="text-danger">
					@error('username')
						{{$message}}.<br>
					@enderror
				</span>

                @if (!is_null(session()->get('user')))
                    @if (session()->get('user') == 'admin')
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select class="form-select form-select-lg" name="role" id="">
                                <option disabled selected>Select one</option>
                                <option>admin</option>
                                <option>normal</option>
                            </select>
                        </div>
                    @endif
                @endif

                <x-inputform label="City:" name="city" type="text" />
                <span class="text-danger">
					@error('city')
						{{$message}}.<br>
					@enderror
				</span>
                <x-inputform label="State:" name="state" type="text" />
                <span class="text-danger">
					@error('state')
						{{$message}}.<br>
					@enderror
				</span>
                <x-inputform label="Country :" name="country" type="text" />
                <span class="text-danger">
					@error('country')
						{{$message}}.<br>
					@enderror
				</span>
                <x-inputform label="Date of Birth :" name="dateofbirth" type="date" />
                <span class="text-danger">
					@error('dateofbirth')
						{{$message}}.<br>
					@enderror
				</span>
				<x-inputform label="Email :" name="email" type="email" />
                <span class="text-danger">
					@error('email')
						{{$message}}.<br>
					@enderror
				</span>
				<x-inputform label="Password :" name="password" type="password" />
                <span class="text-danger">
					@error('password')
						{{$message}}.<br>
					@enderror
				</span>
				<input type="submit" name="submit" value="SignUp" class="m-3 btn btn-primary text-uppercase" style="width: 10vw;">
			</form>
		</div>
	</div>
	@endsection
