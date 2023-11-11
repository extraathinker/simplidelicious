@extends('frontend.layouts.base')
@section('main-container')
    <div class="container-fluid bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 mt-2"><a href="{{url('/')}}" class="text-white"><i class="bi bi-house"></i></a></div>
                <div class="col-lg-3">
                    <p class="p-1 mt-1 d-none">Hi User</p>
                </div>
                <div class="col-lg-8">
                    <ul class="nav">
                        <li class="nav-item p-2 mx-3 text-uppercase"><a href="/admin/userdata" class="text-decoration-none text-white">User</a></li>
                        <li class="nav-item p-2 mx-3 text-uppercase"><a href="/admin/recipedata" class="text-decoration-none text-white">Recipes</a></li>
                        <li class="nav-item p-2 mx-3 text-uppercase"><a href="/admin/categorydata" class="text-decoration-none text-white">Categories</a></li>
                        <li class="nav-item p-2 mx-3 text-uppercase"><a href="/admin/approvaldata" class="text-decoration-none text-white">Approval</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="min-height: 500px;">
        <div class="container p-3">
            <div class="row p-2">
				<div class="col-lg-8">
					<form method="get" action="/admin/searchuser">
						<div class="row form-group p-2">
							<div class="col-lg-6">
								<input type="text" class="form-control" placeholder="Search" name="search">
							</div>
							<div class="col-lg-3">
								<select class="form-select form-control" name="bycategory">
									<option disabled selected>Select category</option>
									<option>name</option>
									<option>gender</option>
									<option>username</option>
									<option>email</option>
									<option>city</option>
									<option>state</option>
									<option>country</option>
								</select>
							</div>
							<div class="col-lg-3">
								<button class="btn btn-primary form-control">Search</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2 p-2">
					<a class="btn btn-primary form-control" href="{{url('/')}}/signup">Add new</a>
				</div>
				<div class="col-lg-2 p-2">
					<a class="btn btn-success form-control">Trash</a>
				</div>
			</div>
            <table class="table border table-danger">
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Date of Birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->state}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->dateofbirth}}</td>
                        @if ($user->status == 1)
                            <td class="bg-success text-white">Active</td>
                        @elseif ($user->status == 0)
                            <td>Inactive</td>
                        @endif
                        <td><a class="btn btn-primary me-3" href="/admin/edituser/{{$user->userId}}">Edit</a><a class="btn btn-danger ms-3" href="{{url('/')}}/admin/deleteuser/{{$user->userId}}">Delete</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

