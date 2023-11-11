@extends('frontend.layouts.base')
@section('main-container')

	<div class="container-fluid">
		<div class="container">
			<div class="bg-warning-subtle" style="max-width: 500px; margin:auto;">
				<h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">Edit Entry</h1>
			</div>
            @foreach ($users as $user)
			<form class="form-group p-3 mb-4 bg-warning-subtle" style="max-width: 500px; margin: auto;" method="post" action="/admin/updateuser">
			    @csrf
				<label class="form-label">Name :</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                <span class="text-danger">
					@error('name')
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

				<label class="form-label">username</label>
                <input type="text" name="username" class="form-control" value="{{$user->username}}">
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

                <label class="form-label">City :</label>
                <input type="text" name="city" class="form-control" value="{{$user->city}}">
                <span class="text-danger">
					@error('city')
						{{$message}}.<br>
					@enderror
				</span>
                <label class="form-label">State :</label>
                <input type="text" name="state" class="form-control" value="{{$user->state}}">
                <span class="text-danger">
					@error('state')
						{{$message}}.<br>
					@enderror
				</span>
                <label class="form-label">Country :</label>
                <input type="text" name="country" class="form-control" value="{{$user->country}}">
                <span class="text-danger">
					@error('country')
						{{$message}}.<br>
					@enderror
				</span>
                <label class="form-label">Date of Birth :</label>
                <input type="date" name="dateofbirth" class="form-control"{{$user->dateofbirth}}>
                <span class="text-danger">
					@error('dateofbirth')
						{{$message}}.<br>
					@enderror
				</span>
				<label class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                <span class="text-danger">
					@error('email')
						{{$message}}.<br>
					@enderror
				</span>
				<label class="form-label">Password :</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger">
					@error('password')
						{{$message}}.<br>
					@enderror
				</span>
				<input type="submit" name="submit" value="Edit Entry" class="m-3 btn btn-primary text-uppercase" style="width: 10vw;">
			</form>
            @endforeach
		</div>
	</div>
	@endsection
