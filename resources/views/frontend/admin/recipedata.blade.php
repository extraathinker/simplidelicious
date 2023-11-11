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
					<form method="get" action="/admin/searchrecipe">
						<div class="row form-group p-2">
							<div class="col-lg-6">
								<input type="text" class="form-control" placeholder="Search" name="search">
							</div>
							<div class="col-lg-3">
								<select class="form-select form-control" name="bycategory">
									<option disabled selected>Select category</option>
									<option>name</option>
									<option>description</option>
									<option>category</option>
									<option>preptime</option>
									<option>cooktime</option>
									<option>ingredients</option>
									<option>instructions</option>
								</select>
							</div>
							<div class="col-lg-3">
								<button class="btn btn-primary form-control">Search</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2 p-2">
					<a class="btn btn-primary form-control" href="{{url('/')}}/admin/newrecipe">Add new</a>
				</div>
				<div class="col-lg-2 p-2">
					<a class="btn btn-success form-control">Trash</a>
				</div>
			</div>
            <table class="table border table-danger table-striped">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>preptime</th>
                    <th>cooktime</th>
                    <th>ingredients</th>
                    <th>instructions</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($recipes as $recipe)
                    <tr>
                        <td>{{$recipe->name}}</td>
                        <td>{{$recipe->author}}</td>
                        <td>{{$recipe->description}}</td>
                        <td>{{$recipe->category}}</td>
                        <td>{{$recipe->preptime}}</td>
                        <td>{{$recipe->cooktime}}</td>
                        <td>{{$recipe->ingredients}}</td>
                        <td>{{$recipe->instructions}}</td>
                        <td>{{$recipe->Date}}</td>
                        <td>{{$recipe->image}}</td>
                        <td><a class="btn btn-primary me-3" href="/admin/editrecipe">Edit</a><a class="btn btn-danger ms-3" href="{{url('/')}}/admin/deleterecipe/{{$recipe->recipeId}}">Delete</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

