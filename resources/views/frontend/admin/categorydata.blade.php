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
				<div class="col-lg-10">
					<form method="get" action="/admin/searchcategory">
						<div class="row form-group p-2">
							<div class="col-lg-9">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-primary form-control">Search</a>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2 p-2">
					<a class="btn btn-primary form-control" href="{{url('/')}}/admin/newcategory">Add new</a>
				</div>
			</div>
            <table class="table border table-danger table-striped">
                <tr>
                    <th>Name</th>
                    <th>Numberofposts</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->numberofposts}}</td>
                        <td><a class="btn btn-danger ms-3" href="{{url('/')}}/admin/deletecategory/{{$category->id}}">Delete</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

